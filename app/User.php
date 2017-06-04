<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarUrl()
    {
        if (is_null($this->avatar)) {
            return 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?d=mm&s=40';
        }

        return $this->avatar;
    }



}
