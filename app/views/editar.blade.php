@extends('layout')

@section ('title') Editar @stop

@section('contenido')
	@foreach($clasificaciones as $clasificacion)
		<li>
			{{HTML::link("informes/$clasificacion->clasificacion",$clasificacion->clasificacion)}}
		</li>
	@endforeach
@stop

@section('content')	
	<h1>Editar</h1>
	{{Form::open(array('route' => 'requisiciones.requisiciones.update', 'method' => 'patch'), array('role' => 'form'))}}
		{{Form::hidden('hidden',$requisicion->folio, array('id'=>"hideFolio") )}}
		{{ Form::label('departamento', 'Departamento') }}
		<select name="departamento" id="departamento">	
			<option value={{$requisicion->departamento}}>{{$requisicion->departamento}}</option>
			@foreach($departamentos as $departamento)		 
			<option value={{$departamento->departamento}}>{{$departamento->departamento}}</option>
			@endforeach
		</select>
		{{ Form::label('Folio ', 'Folio') }}
		{{ Form::text('Folio', $requisicion->folio, array('placeholder'=>"Folio",'size'=>'10px', "id"=>'Folio',"title" =>'Indtrodusca el numero del folio', "pattern"=>'^([1-9][0-9]*[z-zA-z]?)', "required"))}}
		{{ Form::label('Proyecto','Proyecto/Programa') }}
		{{ Form::text('Proyecto', $requisicion->proyecto,array('placeholder'=>'Proyecto/Programa' ,'size'=>'10px','title' =>'Indtrodusca nombre del proyecto', 'pattern'=>'^([z-zA-z]+\s*)+', 'required'))}}
		{{ Form::label('Partida ', 'Partida') }}
		<select name="partida" id="partida">
			<option value={{$requisicion->partida}}>{{$requisicion->partida}}</option>
			@foreach($partidas as $partida)
				<option value={{$partida->partida}}>{{$partida->partida}}</option>
			@endforeach
		</select>
		{{Form::label('año','Año')}}
		{{Form::text('año',$requisicion->año,array('placeholder'=>'Año','size'=>1,'title' =>'Indtrodusca el año', 'pattern'=>'^([1-9][0-9][0-9][0-9]))', 'required'))}}
		<p>
			{{ Form::label("anexos",'Doc Anexo')}}
			<select name="anexos" id="anexos">
				<option value={{$requisicion->anexos}}>{{$requisicion->anexos}}</option>
				@foreach($anexos as $anexo)
					<option value={{$anexo->anexo}}>{{$anexo->anexo}}</option>
				@endforeach
			</select>
			{{Form::label("fecha_planeacion","Fecha Recibo de Planeacion")}}
			{{Form::text("fecha_planeacion", $requisicion->fecha_planeacion, array("placeholder"=>"dd/mm/YYYY", 'size'=>'8px','title' =>'Ingrese un formato valido dd/mm/aaaa','pattern'=>'^([0-9][0-9]/[0-9][0-9]/[1-9][0-9][0-9][0-9])' ,'required'))}}
			{{Form::label("clasificacion","Clasificacion")}}
			<select name="clasificacion" id="clasificacion">
				<option value={{$requisicion->clasificacion}}>{{$requisicion->clasificacion}}</option>
				@foreach($clasificaciones as $clasificacion)
					<option value={{$clasificacion->clasificacion}}>{{$clasificacion->clasificacion}}</option>
				@endforeach	
			</select>
			{{Form::label("fecha_materiales","Fecha  Recibido en Rec.Materiales")}}
			{{Form::text("fecha_materiales", $requisicion->fecha_materiales, array("placeholder"=>"dd/mm/YYYY", 'size'=>'8px'))}}
		</p>
		<div class="articulos">
			<div>
				{{Form::label("cantidad0","Cantidad")}}
				{{Form::label("unidad0","Unidad")}}
				{{Form::label("descripcion0","Descripcion")}}
				{{Form::label("unitario0","Precio Unitario")}}
				{{Form::label("importe0","Importe")}}
				{{Form::label("abierto0","Abierto")}}
			</div>
			<div class="elementos">
				{{Form::hidden('hidden',count($articulos), array('id'=>"hideElementos"))}}
				@foreach($articulos as $articulo)
					<div>
						{{Form::hidden('hidden',$articulo->id, array('id'=>"hideId"))}}
						{{Form::text("cantidad",$articulo->cantidad,array('id'=>'cantidad'.($articulo->numero-1),"class"=>"cantidad","data-articulo"=>'0',"placeholder"=>"Cantidad",'size'=>'8px','title' =>'Se requiere una cantidad numerica' ,'pattern'=>'^[1-9][0-9]*\s?$','required'))}}
						{{Form::text("unidad",$articulo->unidad,array('id'=>'unidad'.($articulo->numero-1) ,"placeholder"=>"Unidad",'size'=>'10px', 'title' =>'Solo acepta texto' ,'pattern'=>'^([z-zA-z]+\s*)+*)' ,'required'))}}
						{{Form::text("descripcion",$articulo->descripcion,array('id'=>'descripcion'.($articulo->numero-1),"placeholder"=>"Descripcion",'size'=>'35px','title'=>'Realice un Descripcion sobre el Producto','pattern'=>'^([z-zA-z]+\s*)+*)' ,'required'))}}
						{{Form::text("unitario",$articulo->unitario,array('id'=>'unitario'.($articulo->numero-1), "class"=>"unitario","data-articulo"=>'0', "placeholder"=>"Precio Unitario",'size'=>'10px','title' =>'Ingrese una Cantidad en Pesos', 'pattern'=>'[0-9]+[0-9]*([.][0-9]{1,2})?$' ,'required'))}}
						{{Form::text("importe",$articulo->importe,array('id'=>'importe'.($articulo->numero-1), "placeholder"=>"Importe",'size'=>'10px','readonly'=>"readonly"))}}
						{{Form::text("abierto",$articulo->abierto,array('id'=>'abierto'.($articulo->numero-1),"placeholder"=>"Abierto",'size'=>'10px'))}}
					</div>
				@endforeach
			</div>
		</div>
		<div>
			{{Form::label("total","Total")}}
			{{Form::text("total",$requisicion->total,array("size"=>"6","value"=>00.00))}}
		</div>		
		<div class='firmas'>
			<div>
				{{Form::label("firma_adquisiciones"," Jefe de Oficina de Adquisiciones")}}
				{{Form::label("firma_servicios","Jefe del Departamento De Recursos Materiales y Servicios")}}
				{{Form::label("firma_administrativos","Subdirector de Servicios Administrativos")}}
			</div>
			<div clas="">
				{{Form::text("firma_adquisiciones", $requisicion->firma_adquisiciones, array("placeholder"=>"Jefe de Oficina de Adquisiciones", "size"=>"35px",'title' =>'Introdusca el nombre del Jefe de la Oficina de Adquisiciones' ,'pattern'=>'^([A-Za-zÑñ]+\s*)+' ,'required'))}}	
				{{Form::text("firma_servicios", $requisicion->firma_servicios, array("placeholder"=>"Jefe del Departamento De Recursos Materiales y Servicios","size"=>"35px", 'title' =>'Introdusca el nombre del Jefe del Departamento de Recursos MAteriales y Servicios','pattern'=>'^([A-Za-zÑñ]+\s*)+','required'))}}
				{{Form::text("firma_administrativos", $requisicion->firma_administrativos, array("placeholder"=>"Subdirector de Servicios Administrativos","size"=>"35px",'title' =>'Introdusca el nombre del Subdirector de servicios materiales','pattern'=>'^([A-Za-zÑñ]+\s*)+' ,'required'))}}
			</div>
		</div>
		{{Form::submit('Enviar')}}
		{{Form::reset('Cancelar')}}
		{{Form::button("Agregar",array("id"=>"agregar"))}}
		{{Form::button("Eliminar",array("id"=>"eliminar"))}}
	{{ Form::close() }}
@stop