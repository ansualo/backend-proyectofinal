<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'surname' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', Password::min(8)->mixedCase()->numbers()],
                'city' => 'required|string',
                'country' => 'required|string',
                'role_id' => 'integer'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $validData = $validator->validated();

            $roleId = isset($validData['role_id']) ? $validData['role_id'] : 2;

            $user = User::create([
                'name' => $validData['name'],
                'surname' => $validData['surname'],
                'email' => $validData['email'],
                'password' => bcrypt($validData['password']),
                'city' => $validData['city'],
                'country' => $validData['country'],
                'role_id' => $roleId
            ]);

            $token = $user->createToken('apiToken')->plainTextToken;

            return response()->json([
                'message' => 'User registered successfully',
                'data' => $user,
                'token' => $token
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error registering user' . $th->getMessage());

            return response()->json([
                'message' => 'Error registering user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email' => 'Email or password are invalid',
                'password' => 'Email or password are invalid'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $validData = $validator->validated();
            $user = User::where('email', $validData['email'])->first();

            if (!$user) {
                return response()->json([
                    'message' => 'Email or password are invalid',
                ], Response::HTTP_FORBIDDEN);
            }

            $token = $user->createToken('apiToken')->plainTextToken;

            return response()->json([
                'message' => 'User logged in successfully',
                'data' => $user,
                'token' => $token
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error logging in' . $th->getMessage());

            return response()->json([
                'message' => 'Error logging in'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout(Request $request)
    {
        try {
            $headerToken = $request->bearerToken();

            $token = PersonalAccessToken::findToken($headerToken);

            $token->delete();

            return response()->json([
                'message' => 'User logged out',
            ], Response::HTTP_OK);
            
        } catch (\Throwable $th) {
            Log::error('Error logging out' . $th->getMessage());

            return response()->json([
                'message' => 'Error logging out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
