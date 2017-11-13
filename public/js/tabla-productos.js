function activar_tabla_empresas() {
    $('#tabla-productos').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 20,
        ajax: 'listado_productos_data',
        columns: [
            { data: 'producto_id', name: 'producto_id' },
            { data: 'nombre', name: 'nombre' },
             { data: 'categoria_id', name: 'categoria_id' },
            { data: null,  render: function ( data, type, row ) {
                return "<img  src=productos/" + data.url_imagen +  " alt='Generic placeholder image' width='100' height='100'>"}  
            },
            { data: null,  render: function ( data, type, row ) {
                return "<a href='{{ url('form_editar_contacto/') }}/"+ data.producto_id +"' class='btn btn-xs btn-primary' >Editar</button>"  }  
            },
        ]
    });
}
activar_tabla_empresas();