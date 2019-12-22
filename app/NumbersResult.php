<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $grade
 * @property Carbon $startAt
 * @property Carbon $rememberTime
 * @property User $user
 * @property NumbersResultItem[] $data
 */
class NumbersResult extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['start_at', 'remember_time', 'grade'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function items()
    {
        return $this->hasMany('App\NumbersResultItem', 'result_id');
    }
}
