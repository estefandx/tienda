<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categoria;
use App\Producto;

class ConsultasController extends Controller
{
    

  
   
   public function buscarProductos(Request $request){
        $form = $request->all();
        $categorias = Categoria::where('categoria_padre',null)->get();
   		$categoria = $request['categoria'];
   		$subcategoria = $request['subcategoria'];
   		$producto  = strtolower($request['producto']);		

   		if ($subcategoria == "" and $producto == "" ) {
   			
   		//$results = DB::select('select * from productos where categoria_id = ?', [$categoria]);

   		/*$resultado = DB::select('SELECT p.*, c.nombre FROM productos p, categorias c
							   where c.categoria_padre = ?
							   and p.categoria_id = c.categoria_id', [$categoria]);*/

   		/*$resultado = Producto::join("categorias","categorias.categoria_id","=","productos.categoria_id")
		->where('categorias.categoria_padre','=', $form['categoria'])
		 ->paginate(10)->withPath('?categoria='.$form['categoria']); */


		 $resultado = Producto::join("categorias","categorias.categoria_id","=","productos.categoria_id")
		->where('categorias.categoria_padre','=', $form['categoria'])
		 ->select('productos.*')
		 ->paginate(10);

		 $resultado->setPath('?categoria='.$form['categoria']);
		
          
     	//DD($resultado);
   		}elseif (!$subcategoria == "" and $producto == "") {

   			///$resultado = DB::select('SELECT * FROM productos WHERE categoria_id = ?', [$subcategoria]);

   			 $resultado = Producto::where('productos.categoria_id','=', $form['subcategoria'])
   			 ->paginate(10);
   			 $resultado->setPath('?subcategoria='.$form['subcategoria']);

   		}elseif(($subcategoria == "" and !$producto == "") or (!$subcategoria == "" and !$producto == "")) {

   			//$resultado = DB::select('SELECT * FROM productos WHERE LOWER(nombre) like "%?%"', [$producto]);
   			
   			 $resultado = Producto::where('nombre','like','%'.strtolower($request['producto']).'%')
   			 ->paginate(10);
   			 $resultado->setPath('?producto='.$form['producto']);




   		}

   		
   	    // DD($resultado);  
   		
   		return view('principal.filtrarProductos',compact('resultado','categorias'));
   		//return view('principal.filtrarProductos')->with('resultado',$resultado);

     }

      public function detalleProducto($id){

      		 $producto = Producto::find($id);

           

      		 return dd($producto);

      }

      public function detalle($id){

         $producto = Producto::find($id);

         $fecha_actual=date("Y/m/d");
           $destacados = Producto::where('prioridad','=',3)
           ->take(4)
           ->orderBy('fecha_inicio', 'ASC')
           ->where('fecha_fin','>',$fecha_actual)->get();

      	return view('principal.detalleProducto',compact('producto','destacados'));
      }
  

      
  }


