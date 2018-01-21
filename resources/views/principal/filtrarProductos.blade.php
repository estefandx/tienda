@extends('principal.base')


@section('contenido')

<div class="container">
<h2>Tienda</h2>
  
<div class="row">

   

    <div class="col-lg-2 ">
         <form  method="GET" action="{{ url('/buscar') }}" >


              <div class="row" class="form-inline">
                  <div class="form-group">
                    <select   class="form-control " id="categoria" name="categoria" placeholder="Categoria">
                        <option value="0">Seleccione una Categoria</option>
                         @foreach($categorias as $categoria)
                        <option value="{{$categoria->categoria_id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                   <select class="form-control" id="subcategoria" name="subcategoria" placeholder="Subcategoria">
                
               
                  </select>
                  </div>
  
          <div class="form-group">
              <label for="categoriaProducto">Departamento</label>
              <select  value="" class="form-control " id="departamento" name="departamento" placeholder="Departamento">
               <option>Seleccionar</option>
              </select>
            </div>

            <div class="form-group">
              <label for="subCategoriaProducto">Ciudad</label>
              <select class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad">
                <option>Seleccionar</option>
              </select>
            </div>
            <div class="form-group">
          <input id="mainSearchForm" type="text" name="producto" class="form-control" placeholder="Busque tu producto... (Opcional)">
</div>
          <div class="form-group">
              <button type="submit" class="btn btn-default">Buscar</button>
                </div>

                </div>
                
                  
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
                            <td @if ($menor === $producto->precio_exito and $producto->precio_exito > 0  ) style="color: red"  @endif>
                                     @if ($producto->precio_exito > 0)
                                             
                                           {{$producto->precio_exito}}
                                       
                                    @else
                                       Producto no disponible
                                    @endif
                             

                           </td>
                            <td @if ($menor === $producto->precio_jumbo and $producto->precio_jumbo > 0 ) style="color: red"  @endif>
                                     @if ($producto->precio_jumbo > 0)
                                             
                                            {{$producto->precio_jumbo}}
                                       
                                    @else
                                       Producto no disponible
                                    @endif
                            
                           </td>

                            <td @if ($menor === $producto->precio_makro and $producto->precio_makro > 0 ) style="color: red"  @endif>
                                     @if ($producto->precio_makro > 0)
                                             
                                             {{$producto->precio_makro}}
                                       
                                    @else
                                       Producto no disponible
                                    @endif
                            
                           </td>

                            <td @if ($menor === $producto->precio_carulla and $producto->precio_carulla > 0 ) style="color: red"  @endif>
                                    @if ($producto->precio_carulla > 0)
                                             
                                             {{$producto->precio_carulla}}
                                       
                                    @else
                                       Producto no disponible
                                    @endif
                            
                           </td>

                            <td @if ($menor === $producto->precio_euro and $producto->precio_euro > 0 ) style="color: red"  @endif>
                                       @if ($producto->precio_euro > 0)
                                             
                                            {{$producto->precio_euro}}
                                       
                                    @else
                                       Producto no disponible
                                    @endif
                             
                           </td>


                           
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                   

                    <center >{!! $resultado->render() !!}</center>
    </div>
                  
</div>  
</div>
@endsection