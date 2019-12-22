<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $time
 * @property WordsResult $result
 * @property Word $correct
 * @property Word $actual
 */
class WordsResultData extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['time'];

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
