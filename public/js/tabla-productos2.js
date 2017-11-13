 var table = $('#contact-table').DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: "listado_productos_data2",
                      columns: [
                        {data: 'producto_id', name: 'producto_id'},
                        {data: 'nombre', name: 'nombre'},
                         {data: 'categoria', name: 'categoria'},
                       /* {data: 'show_photo', name: 'show_photo'},*/
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                      ]
                    });