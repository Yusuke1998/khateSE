<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestGoogle extends Model
{
    protected $fillable = ['link','topic_id','section_id','teacher_id'];

    public function notegoogle()
    {
    	return $this->hasOne(NoteGoogle::class);
    }

    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class);
    }
}
