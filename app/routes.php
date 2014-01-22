<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$clasificaciones   = Clasificacion::all();
	$año = DB::Table('requisicion')	->select('año')->distinct()->get();
	dd($año);
	return View::make('index',array('clasificaciones'=>$clasificaciones, "año"=>$año));
});

Route::get('capturar', function()
{
	$departamentos   = Departamento::all();
	$partidas        = Partida::all();
	$anexos          = Anexo::all();
	$calsificaciones = Clasificacion::all();
	return View::make('capturar', array('departamentos'=>$departamentos,
										 "partidas"=>$partidas,
										 "anexos"=>$anexos,
										 "clasificaciones"=>$calsificaciones));
});

Route::get('general',function(){	
	$requisiciones = Requisicion::where('aceptado','=','1')->get();
	$clasificaciones   = Clasificacion::all();
	return View::make('capturadas',array('clasificaciones'=>$clasificaciones,"requisiciones"=>$requisiciones,"titulo"=>"General","opcion"=>"general"));
});

Route::get("folios",function(){
	$folios = Requisicion::all();
	return  Response::json($folios);
});


Route::get("aceptar/{id}",function($id){

	$requisicion = Requisicion::find($id);
		$requisicion->aceptado=1;
		$requisicion->save();
		$requisiciones = Requisicion::where('aceptado','=','1')->get();
		return View::make('capturadas',array("requisiciones"=>$requisiciones,"titulo"=>"General","opcion"=>"general"));	
});



Route::get('pdf/{folio}', function($folio){

        Fpdf::AddPage();
        Fpdf::SetFont('Arial','B',16);
        Fpdf::Cell(40,10,'Hello World!'.$folio);
        Fpdf::Output();
        exit;

});

Route::get("requisiciones/requisiciones/{id}/folios",function($id){
	$folios = Requisicion::all();
	return  Response::json($folios);
});

Route::post("requisiciones/requisiciones/{id}/articulos/articulo",function($id){
	$requisicion = new Articulo;
	$data=Input::all();
	$requisicion->fill($data);
	$requisicion->save();
	return "hola";
});
Route::put("requisiciones/requisiciones/{id}/articulos/articulo",function($id){	
	$id                    = Input::get('id');
	$folio                 = Input::get('folio');
	$numero                = Input::get('numero');
	$cantidad              = Input::get('cantidad');
	$unidad                = Input::get('unidad');
	$descripcion           = Input::get('descripcion');
	$unitario              = Input::get('unitario');
	$importe               = Input::get('importe');
	$abierto               = Input::get('abierto');
	$articulo              = Articulo::find($id);
	$articulo->folio       = $folio;
	$articulo->numero      = $numero;
	$articulo->cantidad    = $cantidad;
	$articulo->unidad      = $unidad;
	$articulo->descripcion = $descripcion;
	$articulo->unitario    = $unitario;
	$articulo->importe     = $importe;
	$articulo->abierto     = $abierto;
	
	$articulo->save();
});

Route::delete("requisiciones/requisiciones/{id}/articulos/articulo",function($id){
	return "destruir";
});

Route::get("requisiciones/requisiciones/{id}/edit/actualizar",function(){

});


Route::get("informes/{clasificacion}",function($clasificacion){

	$clasificaciones   = Clasificacion::all();
	$requisiciones = Requisicion::where( 'clasificacion' ,'=', $clasificacion )->get();
	return View::make('capturadas',array('clasificaciones'=>$clasificaciones,"requisiciones"=>$requisiciones,"titulo"=>$clasificacion,"opcion"=>"general"));
	// return $clasificacion;
});
Route::resource('requisiciones/requisiciones', 'Admin_RequisicionesController');
Route::resource('articulos/articulo', 'ArticuloController');