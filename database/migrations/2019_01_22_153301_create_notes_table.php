<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notes', function (Blueprint $table) {
			$table->increments('id');
			$table->tinyInteger('note');
			$table->unsignedInteger('test_id');
			$table->unsignedInteger('user_id');
			$table->timestamps();

			$table->foreign('test_id')->references('id')->on('tests');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('notes');
	}
}
