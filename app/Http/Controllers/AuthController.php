<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ApiResponse;

class AuthController extends Controller
{
public function register(Request $req)
{
    $req->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    $user = User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => bcrypt($req->password)
    ]);

    return ApiResponse::success($user, "User registered", 201);
}

public function login(Request $req)
{
    $req->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $req->email)->first();

    if (!$user || !Hash::check($req->password, $user->password)) {
        return ApiResponse::error("Invalid credentials", 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return ApiResponse::success([
        'token' => $token
    ], "Login successful");
}

}
