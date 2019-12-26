<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveImagesResultRequest;
use App\Http\Requests\SaveResultRequest;
use App\Http\Requests\WordsResultsListRequest;
use App\ImagesResult;
use App\NumbersResult;
use App\Services\ResultsListService;
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

    public function saveWordsResult(SaveResultRequest $req, SaveResultService $saveResultService)
    {
        return $saveResultService->saveWordsResult([
            'start_at' => $req->start_at,
            'preparation_time' => $req->preparation_time,
            'recall_preparation_time' => $req->recall_preparation_time,
            'recall_time' => $req->recall_time,
            'template' => $req->template,
            'items' => $req->items,
        ], $req->user('api'));
    }

    public function saveImagesResult(SaveImagesResultRequest $req, SaveResultService $saveResultService)
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

    public function getWordsResultsList(WordsResultsListRequest $req, ResultsListService $resultsListService)
    {
        return $resultsListService->wordsList([
            'user_id' => $req['user_id'],
            'limit' => $req['limit'],
        ]);
    }

    public function getNumbersResultsList(WordsResultsListRequest $req, ResultsListService $resultsListService)
    {
        return $resultsListService->numbersList([
            'user_id' => $req['user_id'],
            'limit' => $req['limit'],
        ]);
    }

    public function getImagesResultsList(WordsResultsListRequest $req, ResultsListService $resultsListService)
    {
        return $resultsListService->imagesList([
            'user_id' => $req['user_id'],
            'limit' => $req['limit'],
        ]);
    }

    public function getNumbersResult($id)
    {
        return NumbersResult::findOrFail($id)->loadMissing('items.data');
    }

    public function getWordsResult($id)
    {
        return WordsResult::findOrFail($id)->loadMissing('items.data.correct');
    }

    public function getImagesResult($id)
    {
        return ImagesResult::findOrFail($id)->loadMissing([
            'items.data.correct', 'items.data.actual'
        ]);
    }
}
