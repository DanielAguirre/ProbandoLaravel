<?php

use Illuminate\Database\Migrations\Migration;

class CreateClasificacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clasificacion',function($table){		
			$table->increments('id');
			$table->string('clasificacion');

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