<?php

namespace App\Http\Controllers;

use App\Services\RandService;

class RandController extends Controller
{
    public function getRandWords(RandService $getRandService, int $len) {
        return $getRandService->getWords($len);
    }

    public function getRandImages(RandService $getRandService, int $len)
    {
        return $getRandService->getImages($len);
    }
}
