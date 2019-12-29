<?php

namespace App\Http\Controllers;

use App\Image;
use App\Word;
use GuzzleHttp\Psr7\Request;

class DatasetController extends Controller
{
    public function addWords(Request $req) {
        $dataset = explode(',', $req->list);

        foreach ($dataset as $item) {
            $word = new Word();
            $word->value = $item;
            $word->save();
        }
    }

    public function addImages(Request $req)
    {
        $dataset = explode(',', $req->list);

        foreach ($dataset as $item) {
            $image = new Image();
            $image->value = $item;
            $image->save();
        }
    }
}
