@extends('principal.base')


@section('contenido')
<div class="container">
<div class="container text-center" id="mainLandingWrapper">
        <div class="row">
          <div class="col-md-12">   
            <img id="shoppingCartImage" src="{{ asset('tienda/images/shopping_cart_racing.png') }}" style="width: 250px">
          </div> 
          <div class="col-md-4 col-md-offset-4 col-xs-7 col-xs-offset-2" id="mainSearchFormWrapper">
            <form  method="GET" action="{{ url('/buscar') }}" >


              <div class="row" class="form-inline">
                  <div class="form-group">
                    <select required=""  class="form-control " id="categoria" name="categoria" placeholder="Categoria">
                        <option value="">Seleccione una Categoria</option>
                         @foreach($categorias as $categoria)
                        <option value="{{$categoria->categoria_id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                   <select class="form-control" id="subcategoria" name="subcategoria" placeholder="Subcategoria">
                
               
                  </select>
                  </div>
                </div>
                
                  <input id="mainSearchForm" type="text" name="producto" class="form-control" placeholder="Busque tu producto... (Opcional)">
                   <button type="submit" class="btn btn-default">Buscar</button>
             </form>
           
          </div>
        </div>
    </div>
     
     <h2>Productos destacados</h2>
    <div class="container text-center infoBoxesWrapper">
      <div class="row">
      	 @foreach($destacados as $producto)
        <div class="col-sm-4">
			<div class="col-lg-12">	
				<a href="/detalle/{{$producto->producto_id}}"> <img   src= "productos/{{$producto->url_imagen}}" alt="Generic placeholder image" width="150" height="150"></a>
		   </div>
		   <div class="col-lg-12">	
				<h3>{{$producto->nombre}}</h3>
		   </div>	

       
        </div>
        @endforeach
      </div>
    </div>  
</div>
@endsection
	