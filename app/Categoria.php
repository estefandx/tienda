<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   
   protected $table = 'Categorias';
   protected $primaryKey = "categoria_id";
   public     $timestamps = false;

    protected $fillable = [
        'nombre','categoria_padre',
    ];


    // relacion para saber todos los productos que pertenecen a una categoria 
    public function Productos()
    {
        return  $this->hasMany(Producto::class,'producto_id');
    }

    public  static function Subcategorias($id)
    {
    	return Categoria::where('categoria_padre',$id)->get();
    }
}
