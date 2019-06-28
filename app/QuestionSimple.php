<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSimple extends Model
{
    protected $fillable = [
    	'text','value','test_simple_id','good'
    ];

    public function noteselects()
    {
        return $this->hasMany(NoteSelect::class);
    }

    public function testsimple()
    {
    	return $this->belongsTo(TestSimple::class);
    }

    public function answersimples()
    {
        return $this->hasMany(AnswerSimple::class);
    }
}
