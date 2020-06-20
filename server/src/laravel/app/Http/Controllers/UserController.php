<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUser(Request $request, $userId)
    {
        $user = User::find($userId);

        if($user) {
            return response()->json(['data' => $user], 200);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    public function updateUser()
    {
    }

    public function deleteUser()
    {
    }
}
