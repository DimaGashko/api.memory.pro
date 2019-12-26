<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function getUser(Request $req, $username)
    {
        /** @var User */
        $user = User::where('username', '=', $username)->firstOrFail();
        $curUser = $req->user('api');

        if ($curUser && $user->username == $curUser->username) {
            return $user;
        }

        return [
            'id' => $user->id,
            'user_name' => $user->username,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'avatar' => $user->avatar,
        ];
    }

    public function getUsersList()
    {
        return User::all()->map(function ($user) {
            return [
                'id' => $user->id,
                'user_name' => $user->username,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'avatar' => $user->avatar,
            ];
        });
    }
}
