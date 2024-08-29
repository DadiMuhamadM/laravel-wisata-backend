<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Login
    public function login(Request $request)
    {
        // validate request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // cek email dan password user dari database
        $user = User::where('email', $request->email)->first();

        // cek user ada atau tidak
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        // cek password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wrong password'
            ], 401);
        }

        // generate token
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    //Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        // $user = $request->user();
        // $user->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout successfully'
        ]);
    }
}
