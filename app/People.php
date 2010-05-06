<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['pin', 'first_name', 'last_name', 'phone', 'avatar'];
    protected $table = 'people';

    public function post()
    {
    	return $this->hasMany('App\Post');
    }

    public function comment()
    {
    	return $this->hasMany('App\Comment');
    }

    public function user()
    {
    	return $this->hasOne('App\User');
    }
}
