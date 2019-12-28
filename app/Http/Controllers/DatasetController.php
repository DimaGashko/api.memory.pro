<?php

namespace App\Http\Controllers;

use App\Image;
use App\Word;

class DatasetController extends Controller
{
    public function addWords(string $set) {
        $dataset = explode(',', $set);

        foreach ($dataset as $item) {
            $word = new Word();
            $word->value = $item;
            $word->save();
        }
    }

    public function addImages(string $set)
    {
        $dataset = explode(',', $set);

        foreach ($dataset as $item) {
            $image = new Image();
            $image->value = $item;
            $image->save();
        }
    }
}
