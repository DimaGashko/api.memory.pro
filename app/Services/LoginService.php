<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LoginService
{

   public function login($userNameOrEmail, $password)
   {
      $isCorrectCredentials = Auth::attempt([
         'username' => $userNameOrEmail,
         'password' => $password,
      ]) || Auth::attempt([
         'email' => $userNameOrEmail,
         'password' => $password,
      ]);

      return ($isCorrectCredentials) ?
         Auth::user()->createToken('app')->accessToken : null;
   }

}
