@extends('adminlte::layouts.app')


@section('main-content')
	

<div class="ibody">
	<h2>Editar Producto</h2>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form name="fregistro" id="fregistro"  method="post" action="{{ url("/producto/{$producto->producto_id}") }}"  enctype="multipart/form-data">
       {{ method_field('put') }}
    	 {{ csrf_field() }}

          <div class="row">
              <div class="col-md-12">
              <label for="productoNombre">Nombre de Producto</label>
              <input type="text" class="form-control" id="productoNombre" name="productoNombre" placeholder="Producto" value="{{$producto->nombre}}">
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <label for="categoriaProducto">Categoria</label>
              <select  value="" class="form-control " id="categoria" name="categoria" placeholder="Categoria">
               <option>seleccionar</option>
				               @foreach($categorias as $categoria)

                      
                

                        <option  @if($producto->Categoria->categoria_padre === $categoria->categoria_id) selected   @endif value="{{$categoria->categoria_id}}">{{$categoria->nombre}}
                        </option>
                        @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label for="subCategoriaProducto">Subcategoria</label>
              <select class="form-control" id="subcategoria" name="subcategoria" placeholder="Subcategoria">
                 <option selected value="{{$producto->categoria_id}}">{{$producto->Categoria->nombre}}</option>
                    
               
              </select>
            </div>
              
          </div>

          
            <div class="row">
              <div class="col-md-4">
                  <label for="precioExito">Precio Exito</label>
                  <input value="{{$producto->precio_exito}}"  type="text" class="form-control" id="precioExito" name="precioExito" placeholder="Precio Exito">
              </div>
            
              <div class="col-md-4">
                  <label for="precioCarulla">Precio Carulla</label>
                  <input value="{{$producto->precio_carulla}}"  type="text" class="form-control" id="precioCarulla" name="precioCarulla" placeholder="Precio Carulla">
             </div>

            <div class="col-md-4">
                <label for="precioEuro">Precio EuroSupermercados</label>
                <input value="{{$producto->precio_euro}}"  type="text" class="form-control" id="precioEuro" name="precioEuro" placeholder="Precio EuroSupermercados">
             </div>

            <div class="col-md-4">
                <label for="precioMakro">Precio Makro</label>
                <input value="{{$producto->precio_makro}}" type="text" class="form-control" id="precioMakro" name="precioMakro" placeholder="Precio Makro">
             </div>

            <div class="col-md-4">
                <label for="precioJumbo">Precio Jumbo</label>
                <input value="{{$producto->precio_jumbo}}" type="text" class="form-control" id="precioJumbo" name="precioJumbo" placeholder="Precio Jumbo">
             </div>
            </div>
           


            <div class="row">
              <div class="col-md-4">
                  <label for="linkExito">Link Exito</label>
          <input  value="{{$producto->link_exito}}" type="text" class="form-control" id="linkExito" name="linkExito" placeholder="Link Exito">
              </div>
            
              <div class="col-md-4">
                <label for="linkCarulla">Link Carulla</label>
          <input value="{{$producto->link_carulla}}" type="text" class="form-control" id="linkCarulla" name="linkCarulla" placeholder="Link Carulla">
             </div>

            <div class="col-md-4">
                <label for="linkEuro">Link EuroSupermercados</label>
          <input value="{{$producto->link_euro}}" type="text" class="form-control" id="linkEuro" name="linkEuro" placeholder="Link EuroSupermercados">
             </div>
             
            <div class="col-md-4">
                <label for="linkMakro">Link Makro</label>
          <input value="{{$producto->link_makro}}" type="text" class="form-control" id="linkMakro" name="linkMakro" placeholder="Link Makro">
             </div>

            <div class="col-md-4">
                <label for="linkJumbo">Link Jumbo</label>
          <input value="{{$producto->link_jumbo}}" type="text" class="form-control" id="linkJumbo" name="linkJumbo" placeholder="Link Jumbo">
             </div>
            </div>


          <div class="row">

            <div class="col-md-4">
                <label>
                <input @if($producto->prioridad === 1) checked   @endif
                  type="radio" name="opcionPrioridad" id="opcionPrioridad1" value="1" >
                  Prioridad Baja
              </label>
            </div>

            <div class="col-md-4">
                <label>
            <input @if($producto->prioridad === 1) checked   @endif
             type="radio" name="opcionPrioridad" id="opcionPrioridad2" value="2">
            Publicidad Normal
          </label>
            </div>

            <div class="col-md-4">
                <label>
            <input @if($producto->prioridad === 1) checked   @endif
             type="radio" name="opcionPrioridad" id="opcionPrioridad3" value="3">
            Publicidad Alta
          </label>
            </div>
              
          </div>


          <div class="row">
            <div class="col-md-6">
                <label for="fechaInicio">Fecha Inicio de Publicidad</label>
                <input  value="{{$producto->fecha_inicio}}" type="date" name="fechaInicio" class="form-control" id="fechaInicio">
            </div>

            <div class="col-md-6">
                <label for="fechaFin">Fecha Fin de Publicidad</label>
                <input value="{{$producto->fecha_fin}}" type="date" name="fechaFin" class="form-control" id="fechaFin">
            </div>

          </div>

           <div class="row">
            <div class="col-md-6">
            	<label for="fechaFin">Imagen den producto</label>
                 <input type="file" id="imagen" name="imagen" placeholder="" class="form-control">
            </div>
          </div> <br>

      <button type="submit" class="btn btn-success">Registrar Producto</button>

    </form>

</div>


@endsection

@section('script-pagina')

<script src="{{ url ('/js/edit.js') }}" type="text/javascript"></script>

@endsection