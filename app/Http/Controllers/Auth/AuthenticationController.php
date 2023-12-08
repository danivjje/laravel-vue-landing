<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthenticationController extends Controller {
    public function login(Request $request) {
        $validated = $request->validate([
            'email' => ['required', 'min:5', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'successfully',
                'user' => Auth::user(),
            ], 200);
        }

        return response()->json(['error' => 'invalid credentials'], 400);
    }

    public function logOut(Request $request) {
        if (Auth::check()) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['message' => 'successfully'], 200);
        }

        return response()->json(['message' => 'your session is not active'], 400);
    }

    public function checkAuth(Request $request) {
        if (Auth::check()) {
            return response()->json([
                'is_authenticated' => Auth::check(),
                'user' => Auth::user(),
            ], 200);
        }

        return response()->json([
            'is_authenticated' => Auth::check(),
            'user' => Auth::user(),
        ], 200);
    }
}
