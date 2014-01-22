<?php 
	class Articulo extends Eloquent{

		protected $table = 'articulo';
		
		protected $fillable = array('folio', 'numero', 'cantidad','unidad','descripcion','unitario','importe','abierto');
	}
 ?>