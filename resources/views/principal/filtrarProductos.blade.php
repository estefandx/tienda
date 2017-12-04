@extends('principal.base')


@section('contenido')

<div class="container">
<h2>Tienda</h2>
  
<div class="row">

   

    <div class="col-lg-2 ">
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

     <div class="col-lg-10 " id="mainSearchFormWrapper">  
         <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Exito</th>
                            <th>Jumbo</th>
                            <th>Makro</th>
                            <th>Carulla</th>
                            <th>EuroSuper</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resultado as $producto)
                         @php
                         $menor =  min($producto->precio_exito, $producto->precio_jumbo,$producto->precio_makro,
                                       $producto->precio_carulla,$producto->precio_euro);
                        @endphp
                        <tr>
                            <td> <a href="/detalle/{{$producto->producto_id}}"> <img   src= "productos/{{$producto->url_imagen}}" alt="Generic placeholder image" width="100" height="100"></a>
                            <p>{{$producto->nombre}}</p>
                            </td>
                            <td @if ($menor === $producto->precio_exito ) style="color: red"  @endif> {{$producto->precio_exito}}</td>
                            <td @if ($menor === $producto->precio_jumbo ) style="color: red"  @endif> {{$producto->precio_jumbo}}</td>
                            <td @if ($menor === $producto->precio_makro ) style="color: red"  @endif> {{$producto->precio_makro}}</td>
                            <td @if ($menor === $producto->precio_carulla ) style="color: red"  @endif> {{$producto->precio_carulla}}</td>
                            <td @if ($menor === $producto->precio_euro ) style="color: red"  @endif> {{$producto->precio_euro}}</td>


                           
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                   

                    <center >{!! $resultado->render() !!}</center>
    </div>
                  
</div>  
</div>
@endsection