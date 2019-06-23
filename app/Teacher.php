<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
    	'status','people_id'
    ];

    public function sections()
    {
    	return $this->hasMany(Section::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function people()
    {
    	return $this->belongsTo(People::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

}
