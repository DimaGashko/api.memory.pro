<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property WordsResultItem $item
 * @property Word $correct
 * @property Word $actual
 */
class WordsResultData extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = [];

    public function item()
    {
        return $this->belongsTo('App\WordsResultItem');
    }

    public function correct()
    {
        return $this->belongsTo('App\Word', 'correct_id');
    }

    public function actual()
    {
        return $this->belongsTo('App\Word', 'actual_id');
    }
}
