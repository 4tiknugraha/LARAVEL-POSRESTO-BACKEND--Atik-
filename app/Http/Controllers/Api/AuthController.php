<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login api
    public function login(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'password' => 'required'
        ]);
        //check if the user exists
        $user = User::where('email', $request->email)->firts();
        if (!$user) {
            return response()->json([
                'user' => 'error',
                'message' => 'User not found'
            ], 404);
        }
        //check if password is correct
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
             'message' => 'Invalid credentials'
            ], 401);
        }
        //generate token
        $tokenResult = $user->createToken('auto-token')->plainTextToken;
        return response()->json([
            'status' => 'success',
            'token' => $token,
            'user' => $user,
        ], 200);

    }
}
