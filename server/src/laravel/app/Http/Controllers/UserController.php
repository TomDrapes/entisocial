<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $request->validate(
            [
                'firstName' => 'required',
                'lastName'  => 'required',
                'email'     => 'required',
                'password'  => 'required'
            ]
        );

        $user = new User(
            [
                'firstName' => $request->get('firstName'),
                'lastName'  => $request->get('lastName'),
                'email'     => $request->get('email'),
                'password'  => $request->get('password'),

            ]
        );

        $user->save();

        return response()->json(
            [
                'message' => 'new user created'
            ],
            201
        );
    }

    public function getUser()
    {
        $user = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 200);
    }

    public function updateUser()
    {
    }

    public function deleteUser()
    {
    }
}
