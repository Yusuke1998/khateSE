<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTimesTable extends Migration
{
    public function up()
    {
        Schema::create('all_times', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('people_id')
            ->unsigned();
            $table->foreign('people_id')
            ->references('id')
            ->on('people');
            $table->integer('test_id')
            ->unsigned()
            ->nullable();
            $table->foreign('test_id')
            ->references('id')
            ->on('tests')
            ->onDelete('cascade');
            $table->integer('test_simple_id')
            ->unsigned()
            ->nullable();
            $table->foreign('test_simple_id')
            ->references('id')
            ->on('test_simples')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('all_times');
    }
}
