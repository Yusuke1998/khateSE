<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestSimple extends Model
{
    protected $fillable = [
    	'topic_id','note','people_id','section_id'
    ];

    public function people()
    {
    	return $this->belongsTo(People::class);
    }

    public function section()
    {
    	return $this->belongsTo(Section::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function answersimples()
    {
    	return $this->hasMany(AnswerSimple::class);
    }

    public function questionsimples()
    {
        return $this->hasMany(QuestionSimple::class);
    }

    public function noteselects()
    {
        return $this->hasMany(NoteSelect::class);
    }
}
