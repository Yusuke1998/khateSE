<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['topic', 'image', 'description'];

    public function content()
    {
    	return $this->hasOne(Content::class);
    }

    public function test()
    {
    	return $this->hasMany(Test::class);
    }

    public function testgoogle()
    {
    	return $this->hasMany(TestGoogle::class);
    }

     public function text_content()
    {
    	return $this->hasOne(TextContent::class);
    }
}
