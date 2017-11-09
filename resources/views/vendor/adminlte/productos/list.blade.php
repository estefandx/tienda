@extends('adminlte::layouts.app')


@section('main-content')
	
 <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Subcategoria</th>
                    <th> precio Exito</th>
                    <th> precio Jumbo</th>
                    <th>precio Carulla</th>
                    <th>precio Makro</th>
                    <th>precio Euro</th>
                    <th>imagen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->Categoria->nombre}}</td>
                    <td>{{$producto->precio_exito}}</td>
                    <td>{{$producto->precio_carulla}}</td>
                    <td>{{$producto->precio_jumbo}}</td>
                    <td>{{$producto->precio_euro}}</td>
                    <td>{{$producto->precio_makro}}</td>
                    <td><img  src= "productos/{{$producto->url_imagen}}" alt="Generic placeholder image" width="100" height="100"></td>
                   
                </tr>
                @endforeach
                </tbody>
            </table>
            <center>{!! $productos->render() !!}</center>


@endsection