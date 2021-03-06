<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @property string $username
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $avatar
 * @property Carbon $birth
 * @property string $password
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'first_name', 'last_name',
        'avatar', 'birth', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['birth'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function numbersResults()
    {
        return $this->hasMany('App\NumbersResult');
    }

    public function wordsResults()
    {
        return $this->hasMany('App\WordsResult');
    }

    public function ImagesResults()
    {
        return $this->hasMany('App\ImagesResult');
    }
}
