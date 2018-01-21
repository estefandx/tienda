<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



 Route::get('/','PaginasUsuariosController@index');
 Route::get('/buscar','ConsultasController@buscarProductos');
 Route::get('/detalle/{id}','ConsultasController@detalle');
 Route::get('/imprimir','ProductController@show');

 //Route::get('/buscar/{categoria}/{subcategoria}/producto','ConsultasController@buscarProductos');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

	Route::resource('producto', 'ProductController');
	Route::get('producto/subcategoria/{id}','ProductController@getSubcategoria');
	Route::get('producto/{id_producto}/subcategoria/{id}','ProductController@getSubcategoria');
	Route::get('/table', function () {
    return view('vendor.adminlte.productos.table');
    });

    Route::get('listado_productos_data','ProductController@data_productos');
    Route::get('listado_productos_data2','ProductController@data_productos2');

    Route::get('listado_productos','ProductController@listado_productos');
    

     Route::get('cargar_imagenes','ProductController@cargar_imagenes');
     Route::post('cargar_imagenes','ProductController@guardar_imagenes');
     
     Route::get('cargar_archivo','ProductController@cargar_archivo');
     Route::post('cargar_archivo','ProductController@cargar_datos_usuarios');


    /// url para obtener datos de paginas 
     Route::get('/paginas','PaginasController@ActualizarProductos');
    


    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});



