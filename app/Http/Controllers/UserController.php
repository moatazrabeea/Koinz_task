<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidationRequest;
use App\Http\Requests\SignupValidationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup(SignupValidationRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user]);
    }

    public function login(LoginValidationRequest $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            $token = $user->createToken('authToken')->accessToken;

            return response()->json(['message' => 'Login successful', 'user' => $user, 'token' => $token]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function test()
    {
        return 'Test Route Working!';
    }
}
