<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property ImagesResultItem $item
 * @property Image $correct
 * @property Image $actual
 */
class ImagesResultData extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = [];

    public function item()
    {
        return $this->belongsTo('App\ImagesResultItem');
    }

    public function correct()
    {
        return $this->belongsTo('App\Image', 'correct_id');
    }

    public function actual()
    {
        return $this->belongsTo('App\Image', 'actual_id');
    }
}
