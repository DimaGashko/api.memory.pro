<?php

namespace App\Services;

use App\Image;

class ImagesService
{

   public function getRand(int $len)
   {
      return Image::limit($len)->inRandomOrder()->get();
   }

}
