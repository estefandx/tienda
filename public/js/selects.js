$("#categoria").change(event => {
	$.get(`subcategoria/${event.target.value}`, function(res, sta){

		$("#subcategoria").empty();
		res.forEach(element => {
			$("#subcategoria").append(`<option value=${element.categoria_id}> ${element.nombre} </option>`);
		});
	});
})


