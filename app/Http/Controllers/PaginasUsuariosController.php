<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;

class PaginasUsuariosController extends Controller
{
    public function index()
    {
        $categorias = Categoria::where('categoria_padre',null)->get();
         return view('principal.index',compact('categorias'));
    }



}
