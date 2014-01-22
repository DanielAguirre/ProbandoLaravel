<?php

use Illuminate\Database\Migrations\Migration;

class CreatePartidaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partida',function($table){
			$table->increments("id");
			$table->string("partida");
			
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