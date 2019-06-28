<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestSimplesTable extends Migration
{
    public function up()
    {
        Schema::create('test_simples', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('note');
            $table->unsignedInteger('topic_id');
            $table->unsignedInteger('people_id');
            $table->unsignedInteger('section_id');
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_simples');
    }
}
