<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequests\LoginRequest;
use App\Http\Requests\AuthRequests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse {
        User::create([
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return response()->json('user created successfully');
    }

    public function authenticate(LoginRequest $request): JsonResponse {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json('მომხმარებლის მონაცემები არასწორია', 422);
        }

        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
