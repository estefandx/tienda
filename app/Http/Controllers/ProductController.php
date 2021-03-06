<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\Ciudad;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Datatables;
use Illuminate\Support\Facades\Session;
use Excel;
use Storage;


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
        $ciudades =   Ciudad::all();
         return view('vendor.adminlte.productos.create',compact('categorias','ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        include(app_path() . '\Http\Controllers\scriptPrecios.php');

       
        $opcionPrioridad = $request['opcionPrioridad'];

        if ($opcionPrioridad == 1) {
            
            $validator = Validator::make($request->all(), [
            'productoNombre' => 'required|max:255',
            'subcategoria' => 'required',
        ]);
            $time = strtotime("2000-01-01");

             $fecha_inicio = date('Y-m-d',$time);
             $fechaFin = date('Y-m-d',$time);


           

        }else{

           $validator = Validator::make($request->all(), [
            'productoNombre' => 'required|max:255',
            'subcategoria' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',  
            ]);

            $fecha_inicio = $request['fechaInicio'];
            $fechaFin = $request['fechaFin'];
        }

         



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

        


       
        Producto::Create([
            'nombre' => $request['productoNombre'],
            'url_imagen' => $nombreImagen,
            'precio_carulla' => precioCarulla($request['linkCarulla']),
            'precio_exito' => precioExito($request['linkExito']),
            'precio_jumbo' => precioJumbo($request['linkJumbo']),
            'precio_euro' => precioEuro($request['linkEuro']),
            'precio_makro' => precioMakro($request['linkMakro']),
            'link_carulla' => $request['linkCarulla'],
            'link_exito' => $request['linkExito'],
            'link_jumbo' => $request['linkJumbo'],
            'link_euro' => $request['linkEuro'],
            'link_makro' => $request['linkMakro'],
            'prioridad' => $request['opcionPrioridad'],
            'fecha_inicio' =>$fecha_inicio,
            'fecha_fin' => $fechaFin,
            'categoria_id' => $request['subcategoria'],
            'ciudad_id'  =>  $request['ciudad'],

        ]);

         Session::flash('message', 'Producto Registrado correctamente');

         return redirect('/producto/create');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        include(app_path() . '\Http\Controllers\scriptPrecios.php');
        $prices = HolaMundo();
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
        $ciudades =   Ciudad::all();
        return view('vendor.adminlte.productos.edit',compact('producto','categorias','ciudades'));

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

        
        $opcionPrioridad = $request['opcionPrioridad'];

        if ($opcionPrioridad == 1) {
            
            $validator = Validator::make($request->all(), [
            'productoNombre' => 'required|max:255',
            'subcategoria' => 'required',
        ]);
            $time = strtotime("2000-01-01");

             $fecha_inicio = date('Y-m-d',$time);
             $fechaFin = date('Y-m-d',$time);


           

        }else{

           $validator = Validator::make($request->all(), [
            'productoNombre' => 'required|max:255',
            'subcategoria' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',  
            ]);

            $fecha_inicio = $request['fechaInicio'];
            $fechaFin = $request['fechaFin'];
        }


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
        $producto->fecha_inicio =  $fecha_inicio;
        $producto->fecha_fin = $fechaFin;
        $producto->categoria_id = $request['subcategoria'];
        $producto->ciudad_id = $request['ciudad'];

        $producto->save();

        Session::flash('editar', 'Producto Editado correctamente');
        
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
         Session::flash('eliminar', 'Producto Eliminado correctamente');
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


     public function cargar_datos_usuarios(Request $request)
    {
       include(app_path() . '\Http\Controllers\scriptPrecios.php'); 
       $archivo = $request->file('archivo');
       $nombre_original=$archivo->getClientOriginalName();
       $extension=$archivo->getClientOriginalExtension();
       $r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
       $ruta  =  storage_path('archivos') ."/". $nombre_original;

       $validator = Validator::make($request->all(), [
            'archivo' => 'required|mimes:xls,xlsx'
           // 'subcategoria' => 'required',
        ]);


          if ($validator->fails()) {
            return redirect('cargar_archivo')
                        ->withErrors($validator)
                        ->withInput($request->all());
        } 
       
       if($r1){
           
            Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) {

                
                $hoja->each(function($fila) {
                    
                        
                        if (strlen($fila->nombre) > 0) {

                        
                        $producto=new Producto;
                        $producto->nombre= $fila->nombre;
                        $producto->link_carulla= $fila->carulla;
                        $producto->link_exito= $fila->exito;
                        $producto->link_jumbo= $fila->jumbo; //este campo llamado telefono se debe agregar en la base de datos c
                        $producto->link_euro= $fila->euro_supermercado;
                        $producto->link_makro= $fila->makro;
                        $producto->prioridad= $fila->prioridad;
                        $producto->fecha_inicio= $fila->fecha_inicio;
                        $producto->fecha_fin= $fila->fecha_fin;
                        $producto->categoria_id= $fila->subcategoria;
                        $producto->precio_exito= precioExito($fila->exito);
                        $producto->precio_jumbo= precioJumbo($fila->jumbo);
                        $producto->precio_euro= precioEuro($fila->euro_supermercado);
                        $producto->precio_makro= precioMakro($fila->makro);
                        $producto->precio_carulla= precioCarulla($fila->carulla);
                        $producto->url_imagen = $fila->imagen;
                        $producto->save();
                    
                        }
                       
             
                });

            });

            Session::flash('correcto', 'archivo cargado correctamente');
            return redirect('/cargar_archivo');
        
       }
       else
       {
            Session::flash('error', 'error al cargar el archivo');
            return redirect('/cargar_archivo');
       }

    }


     public function cargar_archivo()
     {
        return view('vendor.adminlte.productos.cargar-datos');
     }


     public function guardar_imagenes(Request $request)
    {

        


            $files = $request->file('file');
            foreach($files as $file){
                $nombreImagen = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreImagen,  \File::get($file));
            }
    }

       public function cargar_imagenes()
     {
        return view('vendor.adminlte.productos.cargar-imagenes');
     }



     public function ActualizarPrecios()
     {
        return view('vendor.adminlte.productos.actualizar-precio');
     }


       public function ActualizarPreciosBD()
     {
        include(app_path() . '\Http\Controllers\scriptPrecios.php'); 
        $productos = Producto::all();


        foreach ($productos as $producto) {
           
                        $producto->precio_exito= precioExito($producto->link_exito);
                        $producto->precio_jumbo= precioJumbo($producto->link_jumbo);
                        $producto->precio_euro= precioEuro($producto->link_euro);
                        $producto->precio_makro= precioMakro($producto->link_makro);
                        $producto->precio_carulla= precioCarulla($producto->link_carulla);
                        $producto->save();

        }

        Session::flash('correcto', 'Productos actualizados en precio');
        return redirect('/actualizar');


   
        
     }

}
