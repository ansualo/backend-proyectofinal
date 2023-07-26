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
    public function getAllUsers()
    {
        try {

            $users = User::get();

            return response()->json([
                'message' => 'Users retrieved',
                'data' => $users
            ], Response::HTTP_OK);
            
        } catch (\Throwable $th) {
            Log::error('Error getting users' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving users',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getDeletedUsers()
    {
        try {

            $users = User::onlyTrashed()->get();

            return response()->json([
                'message' => 'Deleted users retrieved',
                'data' => $users
            ], Response::HTTP_OK);
            
        } catch (\Throwable $th) {
            Log::error('Error retrieving deleted users' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving deleted users',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function profile()
    {
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

    public function updateProfile(Request $request)
    {
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

    public function deleteProfile()
    {
        try {
            $user = auth()->user();
            User::destroy($user->id);

            return response()->json([
                'message'=> 'User deleted successfully',
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error deleting user' . $th->getMessage());

            return response()->json([
                'message' => 'Error deleting user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteProfileAsAdmin($id)
    {
        try {

            $user = User::find($id);
            $user->delete();
            // User::destroy($id);
            
            return response()->json([
                'message'=> 'User deleted successfully'
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error deleting user' . $th->getMessage());

            return response()->json([
                'message' => 'Error deleting user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function restoreProfile($id, Request $request)
    {
        try {
            
            User::withTrashed()->where('id', $id)->restore();

            return response()->json([
                'message' => 'User restored successfully',
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error restoring user' . $th->getMessage());

            return response()->json([
                'message' => 'Error restoring user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}

