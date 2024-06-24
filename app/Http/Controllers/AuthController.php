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
            // 'token' => $token->plainTextToken
            'token' => $token->plainTextToken,
            // "token_enc" => $token
        ];
    }

    public function refresh(Request $request) {
        // return [
        //     'token' => auth()->user(),
        //     "expires_at" => auth()->
        // ];
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

}
