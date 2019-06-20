<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**

    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->decimal('note', 2, 2);
            $table->unsignedInteger('people_id');
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('answer_id');

            $table->foreign('people_id')->references('id')->on('people');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tests');
    }

    **/
}
