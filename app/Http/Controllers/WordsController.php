<?php

namespace App\Http\Controllers;

use App\Services\WordsService;

class WordsController extends Controller
{
    public function getRand(WordsService $wordsService, int $len) {
        return $wordsService->getRand($len);
    }
}
