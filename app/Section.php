<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['sections'];

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
}
