<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $time
 * @property WordsResult $result
 * @property Word $data
 */
class WordsResultItem extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['time'];

    public function result()
    {
        return $this->belongsTo('App\WordsResult');
    }

    public function data()
    {
        return $this->hasMany('App\WordsResultData', 'item_id');
    }
}


