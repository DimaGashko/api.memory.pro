<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $grade
 * @property Carbon $startAt
 * @property int $preparation_time
 * @property int $recall_preparation_time
 * @property int $recallTime
 * @property User $user
 * @property NumbersResultItem[] $data
 */
class NumbersResult extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['start_at', 'recall_time', 'preparation_time', 'recall_preparation_time', 'grade'];

    protected $hidden = ['user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function items()
    {
        return $this->hasMany('App\NumbersResultItem', 'result_id');
    }
}
