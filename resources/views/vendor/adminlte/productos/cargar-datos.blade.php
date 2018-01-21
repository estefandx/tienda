@extends('adminlte::layouts.app')


@section('main-content')
	

<div class="">
	<h2>Cargar archivo de  Productos</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	


@if(Session::has('correcto'))
  <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   Archivo cargado correctamente 
</div>

@endif

@if(Session::has('error'))
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   Error al cargar el archivo 
</div>

@endif

    <form name="fregistro" id="fregistro"  method="POST" action="{{ url('/cargar_archivo') }}" enctype="multipart/form-data">
    	{{ csrf_field() }}

     


           <div class="row">
            <div class="col-md-12">
            	<label for="fechaFin">Subir Archivo de Excel</label>
                 <input type="file" id="archivo" name="archivo" accept=".xlsx"  class="form-control">
            </div>
          </div> <br>

      <button type="submit" class="btn btn-success">Cargar Archivo </button>

    </form>

</div>


@endsection

@section('script-pagina')

<script src="{{ url ('/js/selects.js') }}" type="text/javascript"></script>

@endsection