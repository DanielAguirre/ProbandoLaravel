<?php

use Illuminate\Database\Migrations\Migration;

class CreateDepartamentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("departamento",function($table){
			$table->increments('id');
			$table->string('departamento');

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