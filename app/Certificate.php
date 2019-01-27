<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
   	protected $fillable = ['note_id'];

   	public function note()
   	{
   		return $this->belongsTo('App\Certificate');
   	}
}
