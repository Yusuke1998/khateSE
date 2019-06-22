<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
    	'note','test_id','people_id','question_id','answer_id'
    ];

    public function test()
    {
    	return $this->belongsTo(Test::class);
    }

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function people()
    {
    	return $this->belongsTo(People::class);
    }

    public function answer()
    {
    	return $this->belongsTo(Answer::class);
    }
}
