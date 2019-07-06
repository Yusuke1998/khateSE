<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllTime extends Model
{
    protected $fillable = [
    	'start_time','end_time','people_id',
    	'test_id','test_simple_id'
    ];

    public function people()
    {
    	return $this->belongsTo(People::class);
    }

    public function test()
    {
    	return $this->belongsTo(People::class);
    }

    public function testsimple()
    {
    	return $this->belongsTo(TestSimple::class);
    }
}
