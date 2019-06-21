<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class People extends Model
{

    protected $fillable = ['first_name', 'last_name', 'avatar'];
    protected $table 	= 'people';

    public function content()
    {
    	return $this->hasOne(Content::class);
    }

    public function text_content()
    {
    	return $this->hasOne(TextContent::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }
}
