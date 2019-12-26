<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $grade
 * @property string $template
 * @property Carbon $start_at
 * @property Carbon $recall_time
 * @property User $user
 * @property WordsResultItem[] $data
 */
class WordsResult extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['start_at', 'recall_time', 'grade'];

    protected $hidden = ['user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function items()
    {
        return $this->hasMany('App\WordsResultItem', 'result_id');
    }
}
