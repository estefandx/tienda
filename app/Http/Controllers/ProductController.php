<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Datatables;

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
        if (isset($file)) {
             $aleatorio = str_random(10);
             $nombreImagen = $aleatorio.$file->getClientOriginalName();
            //$file->move('peliculas',$nombre);
            \Storage::disk('local')->put($nombreImagen,  \File::get($file));

        }else{

             $nombreImagen = "";
        }
       
        Producto::only([
            'nombre' => $request['productoNombre'],
            'url_imagen' => $nombreImagen,
            'precio_carulla' => 0,
            'precio_exito' => 0,
            'precio_jumbo' => 0,
            'precio_euro' => 0,
            'precio_makro' => 0,
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
        $producto = Producto::find($id);
        $categorias = Categoria::where('categoria_padre',null)->get();
        return view('vendor.adminlte.productos.edit',compact('producto','categorias'));

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

        $producto = Producto::find($id);

        $validator = Validator::make($request->all(), [
            'productoNombre' => 'required|max:255',
           // 'subcategoria' => 'required',
        ]);


          if ($validator->fails()) {
            return redirect('producto/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput($request->all());
        } 



         $file = Input::file('imagen');
        if (isset($file)){
            $aleatorio = str_random(10);
            $nombre = $aleatorio.$file->getClientOriginalName();
            //$file->move('peliculas',$nombre);
            \Storage::disk('local')->put($nombre,  \File::get($file));
            \Storage::disk('local')->delete($producto->url_imagen);
            $producto->url_imagen = $nombre;

        }

        

        $producto->nombre = $request['productoNombre'];
        $producto->precio_carulla = $request['precioCarulla'];
        $producto->precio_exito = $request['precioExito'];
        $producto->precio_jumbo = $request['precioJumbo'];
        $producto->precio_euro = $request['precioEuro'];
        $producto->precio_makro = $request['precioMakro'];
        $producto->link_carulla = $request['linkCarulla'];
        $producto->link_exito = $request['linkExito'];
        $producto->link_jumbo = $request['linkJumbo'];
        $producto->link_euro = $request['linkEuro'];
        $producto->link_makro = $request['linkMakro'];
        $producto->prioridad = $request['opcionPrioridad'];
        $producto->fecha_inicio = $request['fechaInicio'];
        $producto->fecha_fin = $request['fechaFin'];
        $producto->categoria_id = 9;
        $producto->save();
        
     return redirect('/listado_productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $producto = Producto::find($id);
        $producto->delete();
       return redirect('/listado_productos');
    }


    public function getSubcategoria(Request $request, $id)
    {
        /*
        if ($request->ajax()) {
            $subcategorias = Categoria::Subcategorias($id);
            return response()->json($subcategorias);
        } */

        return Categoria::Subcategorias($id);
    }


     public function listado_productos(){
        return view('vendor.adminlte.productos.datatable2');
     }


     public function data_productos(){

           return Datatables::eloquent(\App\Producto::query())->make(true);
     }

     public function data_productos2(){

            $contact = Producto::all();
 
        return Datatables::of($contact)
           /* ->addColumn('show_photo', function($contact){
                if ($contact->url_imagen == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($contact->url_imagen) .'" alt="">';
            })*/
            ->addColumn('categoria', function($contact){
                
                return  $contact->Categoria->nombre;
            })
            ->addColumn('action', function($contact){
                return 
                       '<a href="'. url('producto/' . $contact->producto_id.'/edit"').' class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>Editar </a> ' .
                       
                       '<form  role="form"  method="post" action="'. url('producto/' . $contact->producto_id) .'">
                             <input name="_method" type="hidden" value="DELETE">
                             <input type="hidden" name="_token" value="'. csrf_token(). '"></input>
                            <input class="btn btn-danger btn-xs" type="submit" value="eliminar" /></input>
                        </form>';
            })
            ->rawColumns(['show_photo','categoria', 'action'])->make(true);
     }

}
