<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $val
 */
class Word extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['val'];
}
