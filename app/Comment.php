<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['comment', 'file', 'people_id', 'post_id'];

	public function post()
	{
		return $this->belongsTo('App\Post');
	}

	public function people()
	{
		return $this->belongsTo('App\People');
	}
}
