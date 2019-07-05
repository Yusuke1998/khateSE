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
    	return $this->belongsTo(TestSimple::class,'test_simple_id');
    }

    public function questionsimple()
    {
    	return $this->belongsTo(QuestionSimple::class,'question_simple_id');
    }

    public function answersimple()
    {
    	return $this->belongsTo(AnswerSimple::class,'answer_simple_id');
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
