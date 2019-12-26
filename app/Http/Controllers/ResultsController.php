<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveImagesResultRequest;
use App\Http\Requests\SaveResultRequest;
use App\ImagesResult;
use App\NumbersResult;
use App\Services\SaveResultService;
use App\WordsResult;

class ResultsController extends Controller
{

    public function saveNumbersResult(SaveResultRequest $req, SaveResultService $saveResultService)
    {
        return $saveResultService->saveNumbersResult([
            'start_at' => $req->start_at,
            'preparation_time' => $req->preparation_time,
            'recall_preparation_time' => $req->recall_preparation_time,
            'recall_time' => $req->recall_time,
            'template' => $req->template,
            'items' => $req->items,
        ],  $req->user('api'));
    }

    public function saveWordsResult(SaveResultRequest $req, SaveResultService $saveResultService) {
        return $saveResultService->saveWordsResult([
            'start_at' => $req->start_at,
            'preparation_time' => $req->preparation_time,
            'recall_preparation_time' => $req->recall_preparation_time,
            'recall_time' => $req->recall_time,
            'template' => $req->template,
            'items' => $req->items,
        ], $req->user('api'));
    }

    public function saveResult(SaveImagesResultRequest $req, SaveResultService $saveResultService)
    {
        return $saveResultService->saveImagesResult([
            'start_at' => $req->start_at,
            'preparation_time' => $req->preparation_time,
            'recall_preparation_time' => $req->recall_preparation_time,
            'recall_time' => $req->recall_time,
            'items_size' => $req->items_size,
            'items' => $req->items,
        ], $req->user('api'));
    }

    public function getNumbersResult($id)
    {
        return NumbersResult::find($id);
    }

    public function getWordsResult($id)
    {
        return WordsResult::find($id);
    }

    public function getImagesResult($id)
    {
        return ImagesResult::find($id);
    }
}
