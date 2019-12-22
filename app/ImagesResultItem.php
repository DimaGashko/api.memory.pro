<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $time
 * @property ImagesResult $result
 * @property ImagesResultData[] $data
 */
class ImagesResultItem extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['time'];

    public function result()
    {
        return $this->belongsTo('App\ImagesResult');
    }

    public function data()
    {
        return $this->hasMany('App\ImagesResultData', 'item_id');
    }
}
