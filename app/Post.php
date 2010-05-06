<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post', 'file', 'topic_id', 'people_id'];

    public function comment()
    {
		return $this->hasMany('App\Comment');
    }

    public function topic()
    {
    	return $this->belongsTo('App\Topic');
    }

    public function people()
    {
    	return $this->belongsTo('App\People');
    }
}
