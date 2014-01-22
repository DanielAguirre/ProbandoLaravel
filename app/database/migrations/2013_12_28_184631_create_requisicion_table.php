<?php

use Illuminate\Database\Migrations\Migration;

class CreateRequisicionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requisicion',function($table){
			$table->increments('id');
			$table->string('departamento');
			$table->string('folio')->unique();
			$table->string('año');
			$table->string('proyecto');
			$table->string('partida');
			$table->string('anexos');
			$table->string('fecha_planeacion');
			$table->string('clasificacion');
			$table->string('fecha_materiales');
			$table->string('firma_adquisiciones');
			$table->string('firma_servicios');
			$table->string('firma_administrativos');			
			$table->string('total');
			$table->boolean('aceptado');
			
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