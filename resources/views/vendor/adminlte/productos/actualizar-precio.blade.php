@extends('adminlte::layouts.app')


@section('main-content')
	

<div class="">
	<h2>Actualizar Precios de productos</h2>

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
   Precio carcago correctamente
</div>

@endif

@if(Session::has('error'))
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Error al actualziar el precio
</div>

@endif

    <form name="fregistro" id="fregistro"  method="POST" action="{{ url('/actualizar') }}" >
    	{{ csrf_field() }}

     


      <button type="submit" class="btn btn-success">Actualizar precios </button>

    </form>

</div>


@endsection

@section('script-pagina')

<script src="{{ url ('/js/selects.js') }}" type="text/javascript"></script>

@endsection