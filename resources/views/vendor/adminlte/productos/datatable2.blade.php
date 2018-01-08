@extends('adminlte::layouts.app')


@section('main-content')

 @if(Session::has('editar'))
       <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Producto Editado Correctamente
      </div>
@endif

@if(Session::has('eliminar'))
       <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Producto eliminado Correctamente
      </div>
@endif
	
  <div class="container">

   


  <table id="contact-table" class="table table-responsive">
                        <thead>
                            <tr>
                                <th width="30">No</th>
                                <th>Producto</th>
                                <th>Categoria</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
 </table>

</div>                    

@endsection

