<?php

namespace App\Services;

use App\Word;

class WordsService
{

   public function getRand(int $len)
   {
      return Word::limit($len)->inRandomOrder()->get();
   }

}
