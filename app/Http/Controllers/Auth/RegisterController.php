<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
    public function register(Request $request) {
        $request->validate([
            'email' => ['required', 'email', 'min:5'],
            'password' => ['required', 'min:6', 'max:30'],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        redirect('/');
        return response()->json(['user' => new UserResource($user)], 200);
    }
}
