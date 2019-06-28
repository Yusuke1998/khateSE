<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionSimplesTable extends Migration
{
    public function up()
    {
        Schema::create('question_simples', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->string('value'); 
            $table->integer('good')->nullable(); #El numero se compara con el id de la respuesta buena
            $table->integer('test_simple_id')->unsigned();
            $table->foreign('test_simple_id')->references('id')->on('test_simples')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('question_simples');
    }
}
