<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    	'section_id','people_id'
    ];

    public function people()
    {
    	return $this->belongsTo(People::class);
    }

    public function section()
    {
    	return $this->belongsTo(Section::class);
    }

    public function answers()
    {
        return $this->belongsToMany('App\Answer');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }
}
