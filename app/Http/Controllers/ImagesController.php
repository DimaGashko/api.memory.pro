<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveImagesResultRequest;
use App\Services\GetRandService;
use App\Services\SaveResultService;
use Illuminate\Support\Facades\Auth;

class ImagesController extends Controller
{
    public function getRand(GetRandService $getRandService, int $len) {
        return $getRandService->getImages($len);
    }

    public function saveResult(SaveImagesResultRequest $req, SaveResultService $saveResultService)
    {
        return $saveResultService->saveImagesResult(Auth::user(), [
            'startAt' => $req->start_at,
            'rememberTime' => $req->remember_time,
            'template' => $req->template,
            'items' => $req->items,
        ]);
    }
}
