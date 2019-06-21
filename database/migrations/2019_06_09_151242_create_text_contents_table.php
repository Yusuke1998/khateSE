<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextContentsTable extends Migration
{
    public function up()
    {
        Schema::create('text_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('textcontent');
            $table->unsignedInteger('topic_id');
            $table->unsignedInteger('people_id');
            $table->unsignedInteger('section_id');
            $table->timestamps();

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('text_contents');
    }
}
