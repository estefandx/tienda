<?php

use Illuminate\Database\Seeder;
use App\Producto;

class productosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $peliculas = factory(Producto::class)->times(200)->create();
    }
}
