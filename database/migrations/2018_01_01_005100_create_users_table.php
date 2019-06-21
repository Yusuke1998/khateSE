<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('type', ['teacher', 'student']);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->unsignedInteger('people_id');
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
