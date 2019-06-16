<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('comment', 800);
            $table->string('file')->nullable();
            $table->unsignedInteger('topic_id');
            $table->unsignedInteger('people_id');
            $table->unsignedInteger('section_id');

            $table->foreign('topic_id')->references('id')->on('topics');
            $table->foreign('people_id')->references('id')->on('people');
            $table->foreign('section_id')->references('id')->on('sections');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
