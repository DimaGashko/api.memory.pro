<?php

namespace App\Http\Controllers;

use App\Services\ImagesService;

class ImagesController extends Controller
{
    public function getRand(ImagesService $imagesService, int $len) {
        return $imagesService->getRand($len);
    }
}
