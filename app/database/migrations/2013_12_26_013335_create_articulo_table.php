<?php

use Illuminate\Database\Migrations\Migration;

class CreateArticuloTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articulo',function($table){
			$table->increments('id');
			$table->string('folio');
			$table->integer('numero');
			$table->integer('cantidad');
			$table->string('unidad');
			$table->string('descripcion');
			$table->integer('unitario');
			$table->integer('importe');
			$table->integer('abierto');

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