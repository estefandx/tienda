$(function(){

	$('#categoria').on('change',onselectSubcategoria);


})

function onselectSubcategoria(){

	var id_categoria = $(this).val();

	if (!id_categoria) {

		$('subcategoria').html(html_select);
	}

	$.get('/api/categoria/'+id_categoria+'/subcategoria', function(data){

		var html_select = '<option value="">Seleccionar Subcategoria (Opcional)</option>';

		for (var i = 0; i < data.length; ++i) {
			 
			 html_select += '<option value="'+data[i].categoria_id+'">'+data[i].nombre+'</option>';
			 $('#subcategoria').html(html_select);

		}


	});


}




