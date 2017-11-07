<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   
    protected $table = 'Categorias';
    protected $primaryKey = "categoria_id";
    public     $timestamps = false;


    // relacion para saber todos los productos que pertenecen a una categoria 
    public function Productos()
    {
        return  $this->hasMany(Productos::class,'producto_id');
    }

    public  static function Subcategorias($id)
    {
    	return Categoria::where('categoria_padre',$id)->get();
    }
}
