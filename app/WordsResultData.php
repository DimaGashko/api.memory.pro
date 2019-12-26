<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $correct_id
 * @property string $actual
 * @property WordsResultItem $item
 * @property Word $correct
 */
class WordsResultData extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['correct_id', 'actual'];

    public function item()
    {
        return $this->belongsTo('App\WordsResultItem');
    }

    public function correct()
    {
        return $this->belongsTo('App\Word', 'correct_id');
    }
}
