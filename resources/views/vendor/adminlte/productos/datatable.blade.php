@extends('adminlte::layouts.app')


@section('main-content')
	
 <div class="box box-primary">
        <div id='table_responsive' style='min-height: 700px;' >

           <table class="table table-bordered" id="tabla-productos" style='width: 100% !important;'>
                <thead>
                   
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>categoria</th>
                        <th>imagen</th>
                        <th>accion</th>
                 
                </thead>
            </table>
         </div>   
    
</div>  


@endsection


