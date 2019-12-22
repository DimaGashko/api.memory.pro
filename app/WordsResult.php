<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Carbon $startAt
 * @property Carbon $rememberTime
 * @property User $user
 * @method User user()
 */
class WordsResult extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['start_at', 'remember_time'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
