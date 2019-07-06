<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeToTestSimples extends Migration
{
    public function up()
    {
        Schema::table('test_simples', function (Blueprint $table) {
            $table->addColumn('integer', 'time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('test_simples', function (Blueprint $table) {
            //
        });
    }
}
