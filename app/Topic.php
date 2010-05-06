<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['topic'];

    public function post()
    {
    	return $this->hasOne('App\Post');
    }
}
