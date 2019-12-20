<?php

namespace App\Services;

use App\Image;
use App\Word;

class GetRandService
{

   public function getWords(int $len)
   {
      $words = Word::limit($len)->inRandomOrder()->get();
      return $this->fitToLen($words->toArray(), $len);
   }

   public function getImages(int $len)
   {
      $images = Image::limit($len)->inRandomOrder()->get();
      return $this->fitToLen($images->toArray(), $len);
   }

   private function fitToLen(array $data, int $len)
   {
      $additionalLen = $len - count($data);
      $additional = $data;

      for ($i = 0; $i < $additionalLen; $i++) {
         $additional[] = $data[array_rand($data)];
      }

      return array_merge($data, $additional);
   }

}
