<?php

namespace App\Http\Controllers;

use App\Services\GetRandService;

class ImagesController extends Controller
{
    public function getRand(GetRandService $getRandService, int $len) {
        return $getRandService->getImages($len);
    }
}
