<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function getUser(Request $req, $id)
    {
        /** @var User */
        $user = User::findOrFail($id);
        $curUser = $req->user('api');

        if ($user->is($curUser)) {
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

}
