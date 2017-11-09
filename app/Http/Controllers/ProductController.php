<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

       // $categorias = Categoria::where('categoria_padre',null)->get();
        $productos = Producto::paginate(10);
        return view('vendor.adminlte.productos.list',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('categoria_padre',null)->get();
         return view('vendor.adminlte.productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'productoNombre' => 'required|max:255',
            'subcategoria' => 'required',
        ]);


          if ($validator->fails()) {
            return redirect('producto/create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }


        $file = Input::file('imagen');
        $aleatorio = str_random(10);
        $nombreImagen = $aleatorio.$file->getClientOriginalName();
        //$file->move('peliculas',$nombre);
        \Storage::disk('local')->put($nombreImagen,  \File::get($file));

        Producto::create([
            'nombre' => $request['productoNombre'],
            'url_imagen' => $nombreImagen,
            'precio_carulla' => $request['precioCarulla'],
            'precio_exito' => $request['precioExito'],
            'precio_jumbo' => $request['precioJumbo'],
            'precio_euro' => $request['precioEuro'],
            'precio_makro' => $request['precioMakro'],
            'link_carulla' => $request['linkCarulla'],
            'link_exito' => $request['linkExito'],
            'link_jumbo' => $request['linkJumbo'],
            'link_euro' => $request['linkEuro'],
            'link_makro' => $request['linkMakro'],
            'prioridad' => $request['opcionPrioridad'],
            'fecha_inicio' => $request['fechaInicio'],
            'fecha_fin' => $request['fechaFin'],
            'categoria_id' => $request['subcategoria'],

        ]);

         return redirect('/producto/create');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getSubcategoria(Request $request, $id)
    {
        if ($request->ajax()) {
            $subcategorias = Categoria::Subcategorias($id);
            return response()->json($subcategorias);
        }
    }
}
