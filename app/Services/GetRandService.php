<?php

namespace App\Services;

use App\Image;
use App\Word;

class GetRandService
{

   private int $maxLen = 50000;

   public function getWords(int $len)
   {
      $len = $this->formatLen($len);
      $words = Word::limit($len)->inRandomOrder()->get();
      
      if (count($words) === 0) {
         return abort('204', 'Not words in db');
      }

      return $this->fitToLen($words->toArray(), $len);
   }

   public function getImages(int $len)
   {
      $len = $this->formatLen($len);
      $images = Image::limit($len)->inRandomOrder()->get();

      if (count($images) === 0) {
         return abort('204', 'Not images in db');
      }

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

   private function formatLen($len)
   {
      return min(max($len, 0), $this->maxLen);
   }
}
