<?php

namespace App\Http\Controllers;

use App\Services\RandService;

class RandController extends Controller
{
    public function randWords(RandService $getRandService, int $len) {
        return $getRandService->getWords($len);
    }

    public function randImages(RandService $getRandService, int $len)
    {
        return $getRandService->getImages($len);
    }
}
