<?php

namespace App\Services;

use App\ImagesResult;
use App\NumbersResult;
use App\WordsResult;

class ResultsListService
{

    public function numbersList(array $options)
    {
        $res = NumbersResult::query();

        if (isset($options['user_id'])) {
            $res = $res->where('user_id', '=', $options['user_id']);
        }

        return $res->get();
    }

    public function wordsList(array $options)
    {
        $res = WordsResult::query();

        if (isset($options['user_id'])) {
            $res = $res->where('user_id', '=', $options['user_id']);
        }

        return $res->get();
    }

    public function imagesList(array $options)
    {
        $res = ImagesResult::query();

        if (isset($options['user_id'])) {
            $res = $res->where('user_id', '=', $options['user_id']);
        }

        return $res->get();
    }

}
