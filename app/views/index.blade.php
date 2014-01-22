@extends ('layout')

@section('contenido')
	@foreach($clasificaciones as $clasificacion)
		<li>
			{{HTML::link("informes/$clasificacion->clasificacion",$clasificacion->clasificacion)}}
		</li>
	@endforeach	
@stop
@section('content')
	<h1>Bienvenido</h1>	
@stop

