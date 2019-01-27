<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['link','topic_id'];

    public function note()
    {
    	return $this->hasOne('App\Note');
    }

    public function topic()
    {
    	return $this->belongsTo('App\Topic');
    }
}