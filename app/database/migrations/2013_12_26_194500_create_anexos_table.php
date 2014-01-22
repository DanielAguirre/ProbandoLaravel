<?php

use Illuminate\Database\Migrations\Migration;

class CreateAnexosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("anexos",function($table){
			$table->increments('id');
			$table->string('anexo');

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
		//
	}

}