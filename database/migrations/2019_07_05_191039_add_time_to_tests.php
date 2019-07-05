<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeToTests extends Migration
{

    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->integer('time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            //
        });
    }
}
