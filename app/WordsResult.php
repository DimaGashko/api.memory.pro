<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $grade
 * @property Carbon $start_at
 * @property Carbon $remember_time
 * @property User $user
 * @property WordsResultItem[] $data
 */
class WordsResult extends Model
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
        return $this->hasMany('App\WordsResultItem', 'result_id');
    }
}
