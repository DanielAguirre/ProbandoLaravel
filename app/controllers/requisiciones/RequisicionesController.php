<?php

class Admin_RequisicionesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$requisiciones = Requisicion::where('aceptado','=','0')->get();
		$clasificaciones   = Clasificacion::all();
		return View::make('capturadas',array('clasificaciones'=>$clasificaciones,"requisiciones"=>$requisiciones,"titulo"=>"Capturadas","opcion"=>""));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{		 
		$requisicion = new Requisicion;
		$data = Input::only('departamento','Folio','año', 'Proyecto', 'partida','anexos','fecha_planeacion','clasificacion','total','fecha_materiales', 'firma_adquisiciones','firma_servicios','firma_administrativos');
		$requisicion->fill($data); 
		$requisicion->save($data);

		return Redirect::to("general");
		// $requisiciones = Requisicion::where('aceptado','=','0')->get();
		// return View::make('capturadas',array("requisiciones"=>$requisiciones,"titulo"=>"Capturadas","opcion"=>""));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 *
	 **/
	public function show($id)
	{
		return "shows";
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			$requisicion     = Requisicion::find($id);
			$departamentos   = Departamento::all();
			$partidas        = Partida::all();
			$anexos          = Anexo::all();
			$calsificaciones = Clasificacion::all();
			$articulos       = Articulo::where('folio','=',$requisicion->folio)->get();
			return View::make('editar',array('requisicion'=>$requisicion,
									'departamentos'=>$departamentos,
									'partidas'=>$partidas,
									'anexos'=>$anexos,
									'clasificaciones'=>$calsificaciones,
									'articulos'	=>$articulos,
										 ));
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{		
		$requisicion = Requisicion::find($id);
		$requisicion->delete();
		return Redirect::to("general");
	}

}