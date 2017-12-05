<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;

class PaginasUsuariosController extends Controller
{
    public function index()
    {	
    	$fecha_actual=date("Y/m/d");
    	 $destacados = Producto::where('prioridad','=',3)
    	 ->take(4)
    	 ->orderBy('fecha_inicio', 'ASC')
    	 ->where('fecha_fin','>',$fecha_actual)->get();
		 
		//dd($destacados);
        $categorias = Categoria::where('categoria_padre',null)->get();
         return view('principal.index',compact('categorias','destacados'));
    }



}
