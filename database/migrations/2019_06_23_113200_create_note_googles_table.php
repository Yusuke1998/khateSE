<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteGooglesTable extends Migration
{
    public function up()
    {
        Schema::create('note_googles', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('note');
            $table->unsignedInteger('testgoogle_id');
            $table->unsignedInteger('people_id');
            $table->foreign('testgoogle_id')->references('id')->on('test_googles');
            $table->foreign('people_id')->references('id')->on('people');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notegoogle');
    }
}
