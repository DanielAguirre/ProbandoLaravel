Requisiciones.Views.formArticulo = Backbone.View.extend({
	events:{
		"blur .unitario": "setTotal",
		"focus .unitario": "getUnitario",
		"blur .cantidad": "setTotalCantidad",
		"focus .cantidad": "getCantidad"
	},
	initialize:function(){
		this.template=_.template($("#articulo").html());
	},	
	render:function(){
		this.data = this.model.toJSON();
		var html = this.template(this.data);
		this.$el.html(html);
	},
	getCantidad:function(){
		id=this.data.articulo;
		this.cantidadAntigua=$('#cantidad'+id).val();
	},
	getUnitario:function(){
		id=this.data.articulo;
		this.valorAntiguo=$('#unitario'+id).val();
	},
	setTotalCantidad:function(){
		id=this.data.articulo;
		cantidad=parseInt($('#cantidad'+id).val());
		valor=parseInt($('#unitario'+id).val());
		if(valor)
			if(this.cantidadAntigua!=cantidad){
				total=parseInt($("#total").val());
				total-=parseInt(valor*this.cantidadAntigua);
				total+=parseInt(valor*cantidad);
				$("#importe"+id).val(valor*cantidad);
				$("#total").val(parseInt(total));
			}
	},
	setTotal:function(){
		id=this.data.articulo;
		valor=$('#unitario'+id).val();
		if(this.valorAntiguo!=valor){
			total=parseInt($("#total").val());			
			total-=this.valorAntiguo*$("#cantidad"+id).val();			
			total+=valor*$("#cantidad"+id).val();			
			$("#importe"+id).val(valor*$("#cantidad"+id).val())
			$("#total").val(total);
		}
	}
});