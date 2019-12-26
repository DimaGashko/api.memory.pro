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
        $res = $res->orderBy('id', 'desc');

        if (isset($options['user_id'])) {
            $res = $res->where('user_id', '=', $options['user_id']);
        }

        if (isset($options['limit'])) {
            $res = $res->limit($options['limit']);
        }

        return $res->get()->loadMissing('user');
    }

    public function wordsList(array $options)
    {
        $res = WordsResult::query();
        $res = $res->orderBy('id', 'desc');

        if (isset($options['user_id'])) {
            $res = $res->where('user_id', '=', $options['user_id']);
        }

        if (isset($options['limit'])) {
            $res = $res->limit($options['limit']);
        }

        return $res->get()->loadMissing('user');
    }

    public function imagesList(array $options)
    {
        $res = ImagesResult::query();
        $res = $res->orderBy('id', 'desc');

        if (isset($options['user_id'])) {
            $res = $res->where('user_id', '=', $options['user_id']);
        }

        if (isset($options['limit'])) {
            $res = $res->limit($options['limit']);
        }

        return $res->get()->loadMissing('user');
    }

}
