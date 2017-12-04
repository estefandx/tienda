@extends('principal.base')


@section('contenido')
<div class="container">
	<h2>{{$producto->nombre}}</h2>
	<div class="row">
		<div class="col-lg-5 ">
			<img  src= "/productos/{{$producto->url_imagen}}" alt="Generic placeholder image" width="300" height="300">
		</div>
		<div class="col-lg-3 ">
			<div class="row">
				<div class="col-lg-6 ">
					<p>Exito</p>
					<p>{{$producto->precio_exito}}</p>
					<a type="button" class="btn btn-primary" href="https://www.spip.net/es_article2262.html" target="_blank" >Comprar</a>
				</div>
				<div class="col-lg-6 ">
					<p>Jumbo</p>
					<p>{{$producto->precio_jumbo}}</p>
					<a type="button" class="btn btn-primary" href="https://www.spip.net/es_article2262.html" target="_blank" >Comprar</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 ">
					<p>Makro</p>
					<p>{{$producto->precio_makro}}</p>
					<a type="button" class="btn btn-primary" href="https://www.spip.net/es_article2262.html" target="_blank" >Comprar</a>
				</div>
				<div class="col-lg-6 ">
					<p>Carulla</p>
					<p>{{$producto->precio_carulla}}</p>
					<a type="button" class="btn btn-primary" href="https://www.spip.net/es_article2262.html" target="_blank" >Comprar</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 ">
					<p>EuroSuper</p>
					<p>{{$producto->precio_euro}}</p>
					<a type="button" class="btn btn-primary" href="https://www.spip.net/es_article2262.html" target="_blank" >Comprar</a>
				</div>
				
			</div>

			
		</div>

	</div>


</div>

@endsection
