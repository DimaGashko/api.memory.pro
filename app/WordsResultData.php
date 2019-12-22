<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $time
 * @property WordsResult $result
 * @property Word $correct
 * @property Word $actual
 * @method WordsResult result()
 * @method Word correct()
 * @method Word actual()
 */
class WordsResultData extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['time'];

    public function result()
    {
        return $this->belongsTo('App\WordsResult');
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
