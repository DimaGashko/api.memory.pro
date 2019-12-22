<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $file img file name in img training folder
 */
class Image extends Model
{
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['file'];
}
