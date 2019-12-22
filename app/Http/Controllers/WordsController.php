<?php

namespace App\Http\Controllers;

use App\Services\GetRandService;
use App\Http\Requests\SaveWordsResultRequest;
use App\Services\SaveResultService;

class WordsController extends Controller
{
    public function getRand(GetRandService $getRandService, int $len) {
        return $getRandService->getWords($len);
    }

    public function saveResult(SaveWordsResultRequest $req, SaveResultService $saveResultService) {
        return $saveResultService->saveWordsResult($req);
    }
}
