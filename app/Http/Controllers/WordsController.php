<?php

namespace App\Http\Controllers;

use App\Services\GetRandService;
use App\Http\Requests\SaveWordsResultRequest;
use App\Services\SaveResultService;
use Illuminate\Support\Facades\Auth;

class WordsController extends Controller
{
    public function getRand(GetRandService $getRandService, int $len) {
        return $getRandService->getWords($len);
    }

    public function saveResult(SaveWordsResultRequest $req, SaveResultService $saveResultService) {
        return $saveResultService->saveWordsResult(Auth::user(), [
            'startAt' => $req->start_at,
            'rememberTime' => $req->remember_time,
            'template' => $req->template,
            'items' => $req->items,
        ]);
    }
}
