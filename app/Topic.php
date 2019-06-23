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

    public function text_content()
    {
    	return $this->hasOne(TextContent::class);
    }

    public function tests()
    {
    	return $this->hasMany(Test::class);
    }
}
