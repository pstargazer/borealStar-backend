<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'device_name' => 'required|string'
        ]);
        $createdUser = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);
        $token_name = $validated['device_name'];
        $token = $createdUser->createToken($token_name);
        return [
            'message' => 'Successfully registered',
            'token' => $token->plainTextToken
        ];
    }

}
