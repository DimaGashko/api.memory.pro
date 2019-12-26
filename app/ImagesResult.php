<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $grade
 * @property Carbon $start_at
 * @property Carbon $recall_time
 * @property User $user
 * @property ImagesResultItem[] $items
 */
class ImagesResult extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['start_at', 'recall_time', 'grade'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function items()
    {
        return $this->hasMany('App\ImagesResultItem', 'result_id');
    }
}
