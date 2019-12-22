<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $time
 * @property WordsResult $result
 * @property NumbersResultData[] $data
 */
class NumbersResultItem extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['time'];

    public function result()
    {
        return $this->belongsTo('App\NumbersResult');
    }

    public function data()
    {
        return $this->hasMany('App\NumbersResultData', 'item_id');
    }
}
