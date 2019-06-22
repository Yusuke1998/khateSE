<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    	'text','value','test_id'
    ];

    public function test()
    {
    	return $this->belongsTo(Test::class);
    }

    // public function answer()
    // {
    // 	return $this->hasOne(Answer::class);
    // }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
