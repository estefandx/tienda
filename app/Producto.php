<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use Notifiable;
    protected $table = 'Productos';
    protected $primaryKey = "producto_id";

     protected $fillable = [
        'nombre', 'precio_carulla', 'precio_exito', 'precio_jumbo','precio_euro','precio_makro',
        'link_carulla','link_exito','link_jumbo','link_euro','link_makro','prioridad','fecha_inicio',
        'fecha_fin','categoria_id'
    ];

    
   


    //para saber la categoria de un producto
     public function Categoria()
    {
        return  $this->belongsTo(Genero::class);
    }


}
