@extends ('layout')
@section ('title') {{$titulo}} @stop

@section('contenido')
  @foreach($clasificaciones as $clasificacion)
    <li>
      {{HTML::link("informes/$clasificacion->clasificacion",$clasificacion->clasificacion)}}
    </li>
  @endforeach 
@stop
@section('content')
  <h1>Lista de Requisiciones</h1>
  
  <table class="table table-striped">
    <tr>
        <th>Folio</th>
        <th>Departamento</th>
        <th>Proyecto</th>
        <th>Partida</th>
        <th>Clasificacion</th>
        <th>Total</th>
        <th>Año</th>
        <th>Acciones</th>
    </tr>    
    @foreach($requisiciones as $requisicion)
      <tr> 
  			<td>{{$requisicion->folio}}</td>
  			<td>{{$requisicion->departamento}}</td>
  			<td>{{$requisicion->proyecto}}</td>
  			<td>{{$requisicion->partida}}</td>
  			<td>{{$requisicion->clasificacion}}</td>
        <td>${{$requisicion->total}}.00</td>
        <td>{{$requisicion->año}}</td>
  			<td>
          @if($opcion)
            <a href="pdf/{{$requisicion->folio}}" target="_blank">{{ HTML::image("assets/imagenes/pdf.jpg", "Logo") }}</a>
          @else
            {{ Form::model($requisiciones, array('route' => array('requisiciones.requisiciones.destroy', $requisicion->id), 'method' => 'DELETE', 'role' => 'form')) }}            
              {{HTML::link("aceptar/$requisicion->id" , "Aceptar",array('class'=>'btn btn-primary'))}}
              <a href="{{route('requisiciones.requisiciones.edit', $requisicion->id) }}"class="btn btn-primary">Editar</a> 
              {{ Form::submit('Eliminar ', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
          @endif
        </td>
      <tr> 
		@endforeach
  </table>
@stop