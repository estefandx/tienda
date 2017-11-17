<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'Ciudades';
    protected $primaryKey = "ciudad_id";
    public     $timestamps = false;

    protected $fillable = ['nombre', ];


     public function Productos()
    {
        return  $this->hasMany(Producto::class,'producto_id');
    }

}
