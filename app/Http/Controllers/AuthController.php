<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuthController extends Controller
{
    use HasFactory;
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'data' => $user,
        ], 201);
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $guard = auth()->guard('api');

        $token = $guard->attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => false,
                'message' => 'Email or password wrong'
            ], 401);
        }

        $user = $guard->user();

        return response()->json([
            'status' => true,
            'message' => 'Login successfully',
            'data' => [
                'user' => $user,
                'token' => $token,
                'expires_in' => config('jwt.ttl') * 60
            ]
        ], 200);
    }

    public function logout()
    {
        auth()->guard()->logout();

        return response()->json([
            'status' => true,
            'message' => 'Logout successfully.'
        ], 200);
    }

    public function me(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully.',
            'data' => $request->user(),
        ]);
    }
}
