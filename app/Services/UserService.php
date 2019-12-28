<?php

namespace App\Services;

use App\User;
use Illuminate\Http\Request;

class UserService
{

   /**
    * Update user info
    *
    * @param User $user
    * @param array $params = {
    *   username: string,
    *   email?: string,
    *   first_name?: string,
    *   last_name?: string,
    *   birth?: Carbon,
    * } r
    *
    * @return User
    */
   public function updateUserData(User $user, Request $r)
   {
      $this->validateUpdateRequest($r);

      if (isset($r->username)) $user->username = $r->username;
      if (isset($r->email)) $user->email = $r->email;
      if (isset($r->first_name)) $user->first_name = $r->first_name;
      if (isset($r->last_name)) $user->last_name = $r->last_name;
      if (isset($r->birth)) $user->birth = $r->birth;

      $user->save();
      return $user;
   }

   public function updateAvatar(User $user, Request $request)
   {
      $this->validateAvatarUpdateRequest($request);

      $user->uploadImage($request->avatar, 'avatar');
      $user->save();

      return $user;
   }

   private function validateAvatarUpdateRequest(Request $request)
   {
      $request->validate([
         'avatar' => 'required|mimes:jpeg,png,gif,webp|max:' . 20 * 1024,
      ]);
   }

   private function validateUpdateRequest(Request $request)
   {
      $request->validate([
         'username' => 'nullable|string|min:2|max:255',
         'email' => 'nullable|string|email|max:255',
         'first_name' => 'nullable|string|min:2|max:255',
         'last_name' => 'nullable|string|min:2|max:255',
         'birth' => 'nullable|date',
      ]);
   }
}
