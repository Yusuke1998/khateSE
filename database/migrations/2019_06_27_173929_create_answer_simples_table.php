<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerSimplesTable extends Migration
{
    public function up()
    {
        Schema::create('answer_simples', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->text('text');
            $table->integer('people_id')->unsigned();
            $table->integer('question_simple_id')->unsigned();
            $table->integer('test_simple_id')->unsigned();

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('question_simple_id')->references('id')->on('question_simples')->onDelete('cascade');
            $table->foreign('test_simple_id')->references('id')->on('test_simples')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('answer_simples');
    }
}
