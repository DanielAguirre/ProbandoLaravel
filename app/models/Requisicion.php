<?php 
	class Requisicion extends Eloquent{
		protected $table ="requisicion";

		protected $fillable = array('departamento','Folio','año', 'Proyecto', 'partida','anexos','fecha_planeacion','clasificacion','total','fecha_materiales', 'firma_adquisiciones','firma_servicios','firma_administrativos');

		public function anexo(){
        	return $this->hasOne('anexos');
    	}
	}
 ?>
