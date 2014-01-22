@extends ('layout')

@section ('title') Capturar @stop

@section('contenido')
	@foreach($clasificaciones as $clasificacion)
		<li>
			{{HTML::link("informes/$clasificacion->clasificacion",$clasificacion->clasificacion)}}
		</li>
	@endforeach
@stop

@section('content')	
	{{Form::open(array('route' => 'requisiciones.requisiciones.store', 'method' => 'POST'), array('role' => 'form' ,'class'=>'capturar'))}}
		{{ Form::label('departamento', 'Departamento') }}
		<select name="departamento" id="departamento">	
			@foreach($departamentos as $departamento)		 
				<option value={{$departamento->id}}>{{$departamento->departamento}}</option>
			@endforeach
		</select>
		{{ Form::label('Folio ', 'Folio') }}
		{{ Form::text('Folio', null, array('placeholder'=>"Folio",'size'=>'10px', "id"=>'Folio',"title" =>'Indtrodusca el numero del folio', "pattern"=>'^([1-9][0-9]*[z-zA-z]?)', "required"))}}
		{{ Form::label('Proyecto','Proyecto/Programa') }}
		{{ Form::text('Proyecto', null,array('placeholder'=>'Proyecto/Programa' ,'size'=>'10px','title' =>'Indtrodusca nombre del proyecto', 'pattern'=>'^([z-zA-z]+\s*)+', 'required'))}}
		{{ Form::label('Partida ', 'Partida') }}
		<select name="partida" id="partida">
			@foreach($partidas as $partida)
				<option value={{$partida->id}}>{{$partida->partida}}</option>
			@endforeach
		</select>
		{{Form::label('año','Año')}}
		{{Form::text('año',null,array('placeholder'=>'Año','size'=>1,'title' =>'Indtrodusca el año', 'pattern'=>'^([1-9][0-9][0-9][0-9]))', 'required'))}}
		<p>
			{{ Form::label("anexos",'Doc Anexo')}}
			<select name="anexos" id="anexos">
				@foreach($anexos as $anexo)
					<option value={{$anexo->id}}>{{$anexo->anexo}}</option>
				@endforeach
			</select>
			{{Form::label("fecha_planeacion","Fecha Recibo de Planeacion")}}
			{{Form::text("fecha_planeacion", null, array("placeholder"=>"dd/mm/YYYY", 'size'=>'8px','title' =>'Ingrese un formato valido dd/mm/aaaa','pattern'=>'^([0-9][0-9]/[0-9][0-9]/[1-9][0-9][0-9][0-9])' ,'required'))}}
			{{Form::label("clasificacion","Clasificacion")}}
			<select name="clasificacion" id="clasificacion">
				@foreach($clasificaciones as $clasificacion)
					<option value={{$clasificacion->id}}>{{$clasificacion->clasificacion}}</option>
				@endforeach	
			</select>
			{{Form::label("fecha_materiales","Fecha  Recibido en Rec.Materiales")}}
			{{Form::text("fecha_materiales", null, array("placeholder"=>"dd/mm/YYYY", 'size'=>'8px'))}}
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
				<div>
					{{Form::text("cantidad",null,array('id'=>'cantidad0',"class"=>"cantidad","data-articulo"=>'0',"placeholder"=>"Cantidad",'size'=>'8px','title' =>'Se requiere una cantidad numerica' ,'pattern'=>'^[1-9][0-9]*\s?$','required'))}}
					{{Form::text("unidad",null,array('id'=>'unidad0' ,"placeholder"=>"Unidad",'size'=>'10px', 'title' =>'Solo acepta texto' ,'pattern'=>'^([z-zA-z]+\s*)+*)' ,'required'))}}
					{{Form::text("descripcion",null,array('id'=>'descripcion0',"placeholder"=>"Descripcion",'size'=>'35px','title'=>'Realice un Descripcion sobre el Producto','pattern'=>'^([z-zA-z]+\s*)+*)' ,'required'))}}
					{{Form::text("unitario",null,array('id'=>'unitario0', "class"=>"unitario","data-articulo"=>'0', "placeholder"=>"Precio Unitario",'size'=>'10px','title' =>'Ingrese una Cantidad en Pesos', 'pattern'=>'[0-9]+[0-9]*([.][0-9]{1,2})?$' ,'required'))}}
					{{Form::text("importe",null,array('id'=>'importe0', "placeholder"=>"Importe",'size'=>'10px','readonly'=>"readonly"))}}
					{{Form::text("abierto",null,array('id'=>'abierto0',"placeholder"=>"Abierto",'size'=>'10px'))}}
				</div>
			</div>
		</div>
		<div>
			{{Form::label("total","Total")}}
			{{Form::text("total",null,array("size"=>"6","value"=>00.00))}}
		</div>		
		<div class='firmas'>
			<div>
				{{Form::label("firma_adquisiciones"," Jefe de Oficina de Adquisiciones")}}
				{{Form::label("firma_servicios","Jefe del Departamento De Recursos Materiales y Servicios")}}
				{{Form::label("firma_administrativos","Subdirector de Servicios Administrativos")}}
			</div>
			<div clas="">
				{{Form::text("firma_adquisiciones", null, array("placeholder"=>"Jefe de Oficina de Adquisiciones", "size"=>"35px",'title' =>'Introdusca el nombre del Jefe de la Oficina de Adquisiciones' ,'pattern'=>'^([A-Za-zÑñ]+\s*)+' ,'required'))}}	
				{{Form::text("firma_servicios", null, array("placeholder"=>"Jefe del Departamento De Recursos Materiales y Servicios","size"=>"35px", 'title' =>'Introdusca el nombre del Jefe del Departamento de Recursos MAteriales y Servicios','pattern'=>'^([A-Za-zÑñ]+\s*)+','required'))}}
				{{Form::text("firma_administrativos", null, array("placeholder"=>"Subdirector de Servicios Administrativos","size"=>"35px",'title' =>'Introdusca el nombre del Subdirector de servicios materiales','pattern'=>'^([A-Za-zÑñ]+\s*)+' ,'required'))}}
			</div>
		</div>
		{{Form::submit('Enviar')}}
		{{Form::reset('Cancelar')}}
		{{Form::button("Agregar",array("id"=>"agregar"))}}
		{{Form::button("Eliminar",array("id"=>"eliminar"))}}
	{{ Form::close() }}
@stop