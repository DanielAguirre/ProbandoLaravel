$(function(){
	valorAntiguo=0;
	cantidadAntigua=0;

	$(".cantidad").on("focus",function(){
		cantidadAntigua=parseInt($(this).val());
	});

	$(".cantidad").on("blur",function(){
		articulo=$(this).attr('data-articulo');
		cantidad=parseInt($(this).val());
		valor=$("#unitario0").val();
		if(valor)
			if(cantidadAntigua!=cantidad){
				total=$("#total").val();
				total-=cantidadAntigua ? valor*cantidadAntigua :0 ;
				total+=valor*cantidad;
				$("#importe"+articulo).val(valor*cantidad);
				$("#total").val(total);
			}
	});

	$(".unitario").on("focus",function(){
		valorAntiguo=$(this).val();
	});	

	$(".unitario").on("blur",function(){
		valor=$(this).val();
		articulo=$(this).attr('data-articulo');
		if(valorAntiguo!=valor){
			total=$("#total").val();
			total-=valorAntiguo*$("#cantidad"+articulo).val();
			total+=valor*$("#cantidad"+articulo).val();
			$("#importe"+articulo).val(valor*$("#cantidad"+articulo).val());
			$("#total").val(total);	
		}

	});	

	window.views.app = new Requisiciones.Views.App($("body"));

	window.collections.requisiciones =  new Requisiciones.Collections.Requisicion();
	window.collections.requisiciones.fetch();
});