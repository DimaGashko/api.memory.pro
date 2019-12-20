<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['file'];
}
