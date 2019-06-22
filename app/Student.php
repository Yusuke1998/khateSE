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

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function question()
    {
        return $this->hasOne(Question::class);
    }

}
