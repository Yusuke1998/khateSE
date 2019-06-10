<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Content extends Model
{
    protected $fillable = ['name','comment', 'file', 'topic_id', 'people_id'];

    public function people()
    {
    	return $this->belongsTo(People::class);
    }

    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }
}