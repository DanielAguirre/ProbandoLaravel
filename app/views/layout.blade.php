<!doctype html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"  content="width=device-width ,initial-scale maximum-scale=1">
	<title>@yield('title', 'Requisiciones')</title>
	{{ HTML::style('assets/css/vendor/normalize.css', array('media' => 'screen')) }}
	{{ HTML::style('assets/css/vendor/jquery-ui-1.10.3.custom.css', array('media' => 'screen')) }}
	{{ HTML::style('assets/css/vendor/bootstrap.css', array('media' => 'screen')) }}
	{{ HTML::style('assets/css/vendor/bootstrap-theme.css', array('media' => 'screen')) }}
	{{ HTML::style('assets/css/estilo.css', array('media' => 'screen')) }}
</head>
<body>
	<header>{{HTML::image('assets/imagenes/departamento.png');}}</header>
	<nav>
		<ul>
			<li>{{HTML::link("/","Inicio")}}</li>
			<li>{{HTML::link("capturar","Capturar")}}</li>
			<li>{{HTML::link("requisiciones/requisiciones","Capturadas")}}</li>
			<li>{{HTML::link("general","General")}}</li>
			<li><a href=""> Informes</a>
				<ul class='subinforme'>
					@yield('contenido')
				</ul>
			</li>
			<li><a href="#"> Configuracion</a></li>	
		</ul>
	</nav>
	<div class="contenido">
        @yield('content')
    </div>

	{{ HTML::script('assets/js/vendor/jquery-2.0.3.min.js') }}
	{{ HTML::script('assets/js/vendor/jquery-ui-1.10.3.custom.js') }}
	{{ HTML::script('assets/js/vendor/underscore.js') }}
	{{ HTML::script('assets/js/vendor/backbone.js') }}
	{{ HTML::script('assets/js/vendor/validator.js') }}

	{{ HTML::script('assets/js/init.js') }}

	{{ HTML::script('assets/js/models/requisicion.js')}}	
	{{ HTML::script('assets/js/models/formArticulo.js')}}
	{{ HTML::script('assets/js/models/articulo.js')}}

	{{ HTML::script('assets/js/collections/requisiciones.js')}}

	{{ HTML::script('assets/js/views/formArticulo.js') }}
	{{ HTML::script('assets/js/views/app.js') }}


	{{ HTML::script('assets/js/main.js') }}

	<script>
		$("#fecha_planeacion").datepicker({dateFormat: 'dd/mm/yy'});
		$("#fecha_materiales").datepicker({dateFormat: 'dd/mm/yy'});
	</script>

	<script id="articulo" text="text/template">		
		<input type="text" id='cantidad<%=articulo%>' class='cantidad' placeholder="Cantidad" size='8px',title ='Se requiere una cantidad numerica' pattern='^[1-9][0-9]*\s?$' required>
		<input type="text" id='unidad<%=articulo%>' placeholder="Unidad" size='10px' 'title'='Solo acepta texto' 'pattern'='^([z-zA-z]+\s*)+*)' required>
		<input type="text" id='descripcion<%=articulo%>' placeholder="Descripcion" size='35px'title='Realice un Descripcion sobre el Producto' pattern='^([z-zA-z]+\s*)+*)'required>
		<input type="text" id='unitario<%=articulo%>' class='unitario' placeholder="Precio Unitario" size='10px',title='Ingrese una Cantidad en Pesos' pattern='[0-9]+[0-9]*([.][0-9]{1,2})?$' required>
		<input type="text" id='importe<%=articulo%>' placeholder="Importe" size='10px' readonly>
		<input type="text" id='abierto<%=articulo%>' placeholder="Abierto" size='10px'>		
	</script>
</body>
</html>	