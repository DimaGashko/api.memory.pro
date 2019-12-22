<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property NumbersResultData $item
 */
class NumbersResultData extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = [''];

    public function item()
    {
        return $this->belongsTo('App\NumbersResultItem');
    }
}
