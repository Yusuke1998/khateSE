<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['section'];

    public function text_content()
    {
    	return $this->hasOne(TextContent::class);
    }

    public function content()
    {
    	return $this->hasOne(Content::class);
    }

    public function people()
    {
    	return $this->hasOne(People::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function testsimples()
    {
        return $this->hasMany(TestSimple::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
