<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestGooglesTable extends Migration
{
    public function up()
    {
        Schema::create('test_googles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->unsignedInteger('topic_id');
            $table->unsignedInteger('section_id');
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testgoogle');
    }
}
