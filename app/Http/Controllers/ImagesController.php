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
            'start_at' => $req->start_at,
            'recall_time' => $req->recall_time,
            'items_size' => $req->items_size,
            'items' => $req->items,
        ]);
    }
}
