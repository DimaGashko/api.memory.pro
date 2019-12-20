<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Services\LoginService;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
   public function login(Request $req, LoginService $loginService)
   {
      $token = $loginService->login($req->usernameOrEmail, $req->password);

      if (!$token) {
         return response()->json(['message' => 'Checkout your credentials'], 401);
      }

      return response()
         ->json(Auth::user(), 200)
         ->cookie('token', $token, null, '/', null, false, true);
   }

   public function register(RegisterRequest $req, UserService $userService)
   {
      $user = new User();
      $user->password = Hash::make($req->password);
      return $userService->updateUserData($user, $req)->refresh();
   }

   public function registerAndLogin(
      RegisterRequest $req,
      UserService $userService,
      LoginService $loginService
   ) {
      $this->register($req, $userService);
      $req->usernameOrEmail = $req->username;

      return $this->login($req, $loginService);
   }

   public function logout()
   {
      Auth::user()->token()->delete();
      return response()->json(['message' => 'Logged out successfully'], 200)
         ->cookie('access_token', '', 0, '/');
   }
}
