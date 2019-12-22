<?php

namespace App\Services;

use App\User;

class SaveResultService
{

   /**
    * Update user info
    *
    * @param array {
    *   startAt: Carbon,
    *   rememberTime: int,
    *   items: {
    *       time: number,
    *       data: {
    *          correct: number,
    *          actual: number,
    *       }[],
    *   }[],
    * } $resultData
    *
    * @return User
    */
   public function saveWordsResult(User $user, array $resultData)
   {
      return $user;
   }

   
}
