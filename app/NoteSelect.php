<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteSelect extends Model
{
    protected $fillable = [
    	'note','test_simple_id','people_id','question_simple_id','answer_simple_id','student_id'
    ];

    public function testsimple()
    {
    	return $this->belongsTo(TestSimple::class);
    }

    public function questionsimple()
    {
    	return $this->belongsTo(QuestionSimple::class);
    }

    public function answersimple()
    {
    	return $this->belongsTo(AnswerSimple::class);
    }

    public function people()
    {
    	return $this->belongsTo(People::class);
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
