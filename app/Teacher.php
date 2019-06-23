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

    public function people()
    {
    	return $this->belongsTo(People::class);
    }

    // flecha

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

}
