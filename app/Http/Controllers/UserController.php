<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller {
    public function index() {
        return UserResource::collection(User::all());
    }

    public function destroy(Request $request, $id) {
        User::findOrFail($id)->delete();
        return response()->json(['message' => 'successfully'], 200);
    }
}
