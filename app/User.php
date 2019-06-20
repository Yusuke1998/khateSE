<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'people_id', 'email', 'password', 'type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function people()
    {
        return $this->belongsTo('App\People');
    }
}
