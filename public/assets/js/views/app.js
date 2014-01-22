var articulos=0;

Requisiciones.Views.App = Backbone.View.extend({
	events:{
		"submit .capturar form"	 : "formulario",
				"submit form"	 : "editarFormulario",
				"click #agregar" : "agregar",
				"click #eliminar": "eliminar",
				"blur #Folio"	 : "getFolio"
	},
	initialize: function ($el){
		this.$el = $el;
		titulo=$('title').text();
		if(titulo==" Editar " ){
			articulos=$('#hideElementos').val()-1;
		}
	},
	agregar:function(){
		articulos++;
		var modelo = new Requisiciones.Models.formArticulo({articulo:articulos});
		var view = new Requisiciones.Views.formArticulo({model:modelo});
		view.render();
		view.$el.appendTo('.elementos');
	},
	eliminar:function(){
		if(articulos>0){
			valor=$('#unitario'+articulos).val();
			total=parseInt($("#total").val());
			total-=valor*$("#cantidad"+articulos).val();
			$("#total").val(total);
			articulos--;
			$(".elementos div:last").remove();
		}

	},
	formulario: function(e){		
		for (var i = 0 ; i <= articulos; i++) {
			var data = {
				folio       : $('#Folio').val(),
				numero		: i+1,
				cantidad    : $('#cantidad'+i).val(),
				unidad      : $('#unidad'+i).val(),
				descripcion : $('#descripcion'+i).val(),
				unitario    : $('#unitario'+i).val(),
				importe     : $('#cantidad'+i).val()*$('#unitario'+i).val(),
				abierto     : $('#abierto'+i).val(),
			};
			var model = new Requisiciones.Models.Articulo(data);
			model.save();
		}
	},
	getFolioAntiguo:function(){		
		this.folioAntiguo = $('#Folio').val();
	},
	getFolio:function(){
		titulo=$('title').text();

		folio= $('#Folio').val();
		if(titulo==" Editar " ){
			folioAntiguo=$("#hideFolio").val();
			if( folio == folioAntiguo)
				return;
		}
		for(var i =0;i<window.collections.requisiciones.length;i++){
			if(window.collections.requisiciones.models[i].attributes.folio==folio)
				alert("El Folio ya exsite favor de introducir uno nuevo");
		}
	},
	editarFormulario:function(e){
		// e.preventDefault();
		Elementos = $('#hideElementos').val()-1;
		for (var i = 0 ; i <= articulos; i++) {
			if(i<=Elementos){
				var data = {
					id			: $('#hideId').val(),
					folio       : $('#Folio').val(),
					numero		: i+1,
					cantidad    : $('#cantidad'+i).val(),
					unidad      : $('#unidad'+i).val(),
					descripcion : $('#descripcion'+i).val(),
					unitario    : $('#unitario'+i).val(),
					importe     : $('#cantidad'+i).val()*$('#unitario'+i).val(),
					abierto     : $('#abierto'+i).val(),
				};
				var model = new Requisiciones.Models.Articulo(data);
				model.save({id:data.id});
			}
			else{
				var data = {
					folio       : $('#Folio').val(),
					numero		: i+1,
					cantidad    : $('#cantidad'+i).val(),
					unidad      : $('#unidad'+i).val(),
					descripcion : $('#descripcion'+i).val(),
					unitario    : $('#unitario'+i).val(),
					importe     : $('#cantidad'+i).val()*$('#unitario'+i).val(),
					abierto     : $('#abierto'+i).val(),
				};
				var model = new Requisiciones.Models.Articulo(data);
				debugger
				model.save();
				debugger
			}
		}
		
	}
});