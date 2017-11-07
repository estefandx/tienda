@extends('adminlte::layouts.app')

	@section('main-content')
	<div class="container">
		<h1>vista de los productos</h1>


		<form>
			<div class="form-group">
			<select class="form-control" name="categoria" id="categoria">
				<option>seleccionar</option>
				 @foreach($categorias as $categoria)
                        <option value="{{$categoria->categoria_id}}">{{$categoria->nombre}}</option>
                        @endforeach
			
			</select>
		</div>

		<div class="form-group">
			<select class="form-control" name="subcategoria" id="subcategoria">
				<option>seleccionar</option>
				 
			
			</select>
		</div>
		
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>




@endsection
