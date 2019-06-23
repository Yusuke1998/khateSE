<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteGoogle extends Model
{
    protected $fillable = ['note', 'testgoogle_id', 'people_id'];

    public function testgoogle()
    {
    	return $this->belongsTo(TestGoogle::class);
    }

    public function people()
    {
    	return $this->belongsTo(People::class);
    }
}
