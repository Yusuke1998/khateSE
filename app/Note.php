<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['note', 'test_id', 'user_id'];

    public function test()
    {
    	return $this->belongsTo('App\Test');
    }

    public function certificate()
    {
    	return $this->hasOne('App\Certificate');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
