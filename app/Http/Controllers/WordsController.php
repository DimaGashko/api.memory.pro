<?php

namespace App\Http\Controllers;

use App\Services\GetRandService;

class WordsController extends Controller
{
    public function getRand(GetRandService $getRandService, int $len) {
        return $getRandService->getWords($len);
    }
}
