<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function profile (){
        try {
            
            $user = auth()->user();

            return response()->json([
                'message' => 'User profile retrieved successfully',
                'data' => $user
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error retrieving user profile' . $th->getMessage());

            return response()->json([
                'message'=>'Error retrieving user profile'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateProfile (Request $request){
        try {
            
            $user = auth()->user();

            $validator = Validator::make($request->all(), [
                'name' => 'string',
                'surname' => 'string',
                'city' => 'string',
                'country' => 'string'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(), 400);
            }

            $validData = $validator->validated();

            $updatedUser = User::find($user->id);

            if (!$updatedUser) {
                return response()->json([
                    'message' => 'User cannot be found'
                ], Response::HTTP_OK);
            }

            if (isset($validData['name'])) {
                $updatedUser->name = $validData['name'];
            }

            if (isset($validData['surname'])) {
                $updatedUser->surname = $validData['surname'];
            }

            if (isset($validData['city'])) {
                $updatedUser->city = $validData['city'];
            }

            if (isset($validData['country'])) {
                $updatedUser->country = $validData['country'];
            }

            $updatedUser->save();

            return response()->json([
                'message' => 'User profile updated successfully',
                'data' => $updatedUser
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error updating profile' . $th->getMessage());

            return response()->json([
                'message'=>'Error updating profile'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
