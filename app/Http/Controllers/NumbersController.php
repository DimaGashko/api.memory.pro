<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveResultRequest;
use App\Services\SaveResultService;
use Illuminate\Support\Facades\Auth;

class NumbersController extends Controller
{

    public function saveResult(SaveResultRequest $req, SaveResultService $saveResultService)
    {
        return $saveResultService->saveNumbersResult(Auth::user(), [
            'start_at' => $req->start_at,
            'remember_time' => $req->remember_time,
            'template' => $req->template,
            'items' => $req->items,
        ]);
    }
}
