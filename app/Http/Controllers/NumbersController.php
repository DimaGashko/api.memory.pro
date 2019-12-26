<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveResultRequest;
use App\Services\SaveResultService;
use Illuminate\Support\Facades\Auth;

class NumbersController extends Controller
{

    public function saveResult(SaveResultRequest $req, SaveResultService $saveResultService)
    {
        return $saveResultService->saveNumbersResult([
            'start_at' => $req->start_at,
            'preparation_time' => $req->preparation_time,
            'recall_preparation_time' => $req->recall_preparation_time,
            'recall_time' => $req->recall_time,
            'template' => $req->template,
            'items' => $req->items,
        ], Auth::user());
    }
}
