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
   
   public function login(Request $request, LoginService $loginService)
   {
      $token = $loginService->login($request->usernameOrEmail, $request->password);

      if (!$token) {
         return response()->json(['message' => 'Checkout your credentials'], 401);
      }

      return response()
         ->json(['message' => 'success'], 200)
         ->cookie('access_token', $token, null, '/', null, false, true);
   }

   public function register(RegisterRequest $request, UserService $userService)
   {
      $user = new User();
      $user->password = Hash::make($request->password);
      return $userService->updateUserData($user, $request)->refresh();
   }

   public function registerAndLogin(
      RegisterRequest $request,
      UserService $userService,
      LoginService $loginService
   ) {
      $this->register($request, $userService);
      return $this->login($request, $loginService);
   }

   public function logout()
   {
      Auth::user()->token()->delete();
      return response()->json(['message' => 'Logged out successfully'], 200)
         ->cookie('access_token', '', 0, '/');
   }
}
