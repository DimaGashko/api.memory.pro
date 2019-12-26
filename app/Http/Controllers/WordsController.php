<?php

namespace App\Http\Controllers;

use App\Services\GetRandService;
use App\Http\Requests\SaveResultRequest;
use App\Services\SaveResultService;
use Illuminate\Support\Facades\Auth;

class WordsController extends Controller
{
    public function getRand(GetRandService $getRandService, int $len) {
        return $getRandService->getWords($len);
    }

    public function saveResult(SaveResultRequest $req, SaveResultService $saveResultService) {
        return $saveResultService->saveWordsResult(Auth::user(), [
            'start_at' => $req->start_at,
            'preparation_time' => $req->preparation_time,
            'recall_preparation_time' => $req->recall_preparation_time,
            'recall_time' => $req->recall_time,
            'template' => $req->template,
            'items' => $req->items,
        ]);
    }
}
