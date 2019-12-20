<?php

namespace App\Services;

use App\Word;
use Illuminate\Support\Facades\Auth;

class WordsService
{

   public function getRand(int $len)
   {
      return Word::limit($len)->inRandomOrder()->get();
   }

}
