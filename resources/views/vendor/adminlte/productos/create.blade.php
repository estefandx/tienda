@extends('adminlte::layouts.app')


@section('main-content')
	

<div class="ibody">
	<h2>Registrar Producto</h2>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(Session::has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Producto Registrado Correctamente
</div>

@endif

    <form name="fregistro" id="fregistro"  method="POST" action="{{ url('/producto') }}" enctype="multipart/form-data">
    	{{ csrf_field() }}

          <div class="row">
              <div class="col-md-12">
              <label for="productoNombre">Nombre de Producto</label>
              <input type="text" class="form-control" id="productoNombre" name="productoNombre" placeholder="Producto" value="{{old('productoNombre')}}">
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <label for="categoriaProducto">Categoria</label>
              <select  value="{{old('categoria')}}" class="form-control " id="categoria" name="categoria" placeholder="Categoria">
               <option>seleccionar</option>
				 @foreach($categorias as $categoria)
                        <option value="{{$categoria->categoria_id}}">{{$categoria->nombre}}</option>
                        @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label for="subCategoriaProducto">Subcategoria</label>
              <select class="form-control" id="subcategoria" name="subcategoria" placeholder="Subcategoria">
                
               
              </select>
            </div>
              
          </div>

          
        <!--    <div class="row">
              <div class="col-md-4">
                  <label for="precioExito">Precio Exito</label>
                  <input value="{{old('precioExito')}}"  type="text" class="form-control" id="precioExito" name="precioExito" placeholder="Precio Exito">
              </div>
            
              <div class="col-md-4">
                  <label for="precioCarulla">Precio Carulla</label>
                  <input value="{{old('precioCarulla')}}"  type="text" class="form-control" id="precioCarulla" name="precioCarulla" placeholder="Precio Carulla">
             </div>

            <div class="col-md-4">
                <label for="precioEuro">Precio EuroSupermercados</label>
                <input value="{{old('precioEuro')}}"  type="text" class="form-control" id="precioEuro" name="precioEuro" placeholder="Precio EuroSupermercados">
             </div>

            <div class="col-md-4">
                <label for="precioMakro">Precio Makro</label>
                <input value="{{old('precioMakro')}}" type="text" class="form-control" id="precioMakro" name="precioMakro" placeholder="Precio Makro">
             </div>

            <div class="col-md-4">
                <label for="precioJumbo">Precio Jumbo</label>
                <input value="{{old('precioJumbo')}}" type="text" class="form-control" id="precioJumbo" name="precioJumbo" placeholder="Precio Jumbo">
             </div>
            </div>  -->
           


            <div class="row">
              <div class="col-md-4">
                  <label for="linkExito">Link Exito</label>
          <input  value="{{old('linkExito')}}" type="text" class="form-control" id="linkExito" name="linkExito" placeholder="Link Exito">
              </div>
            
              <div class="col-md-4">
                <label for="linkCarulla">Link Carulla</label>
          <input value="{{old('linkCarulla')}}" type="text" class="form-control" id="linkCarulla" name="linkCarulla" placeholder="Link Carulla">
             </div>

            <div class="col-md-4">
                <label for="linkEuro">Link EuroSupermercados</label>
          <input value="{{old('linkEuro')}}" type="text" class="form-control" id="linkEuro" name="linkEuro" placeholder="Link EuroSupermercados">
             </div>
             
            <div class="col-md-4">
                <label for="linkMakro">Link Makro</label>
          <input value="{{old('linkMakro')}}" type="text" class="form-control" id="linkMakro" name="linkMakro" placeholder="Link Makro">
             </div>

            <div class="col-md-4">
                <label for="linkJumbo">Link Jumbo</label>
          <input value="{{old('linkJumbo')}}" type="text" class="form-control" id="linkJumbo" name="linkJumbo" placeholder="Link Jumbo">
             </div>
            </div>


          <div class="row">

            <div class="col-md-4">
                <label>
                <input type="radio" name="opcionPrioridad" id="opcionPrioridad1" value="1" checked>
                Prioridad Baja
              </label>
            </div>

            <div class="col-md-4">
                <label>
            <input type="radio" name="opcionPrioridad" id="opcionPrioridad2" value="2">
            Publicidad Normal
          </label>
            </div>

            <div class="col-md-4">
                <label>
            <input type="radio" name="opcionPrioridad" id="opcionPrioridad3" value="3">
            Publicidad Alta
          </label>
            </div>
              
          </div>


          <div class="row">
            <div class="col-md-6">
                <label for="fechaInicio">Fecha Inicio de Publicidad</label>
                <input  value="{{old('fechaInicio')}}" type="date" name="fechaInicio" class="form-control" id="fechaInicio">
            </div>

            <div class="col-md-6">
                <label for="fechaFin">Fecha Fin de Publicidad</label>
                <input value="{{old('fechaFin')}}" type="date" name="fechaFin" class="form-control" id="fechaFin">
            </div>

          </div>

           <div class="row">
            <div class="col-md-6">
            	<label for="fechaFin">Imagen den producto</label>
                 <input type="file" id="imagen" name="imagen" placeholder="duracion(minutos)" class="form-control">
            </div>
          </div> <br>

      <button type="submit" class="btn btn-success">Registrar Producto</button>

    </form>

</div>


@endsection

@section('script-pagina')

<script src="{{ url ('/js/selects.js') }}" type="text/javascript"></script>

@endsection