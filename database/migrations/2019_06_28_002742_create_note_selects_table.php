<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteSelectsTable extends Migration
{
    public function up()
    {
        Schema::create('note_selects', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('note');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('people_id');
            $table->unsignedInteger('test_simple_id');
            $table->unsignedInteger('question_simple_id');
            $table->unsignedInteger('answer_simple_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('people_id')->references('id')->on('people');
            $table->foreign('test_simple_id')->references('id')->on('test_simples');
            $table->foreign('question_simple_id')->references('id')->on('question_simples');
            $table->foreign('answer_simple_id')->references('id')->on('answer_simples');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('note_selects');
    }
}
