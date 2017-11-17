<?php

use Illuminate\Database\Seeder;
use App\Ciudad;

class CiudadesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudad::create(['nombre' => 'Toda Colombia']);
        Ciudad::create(['nombre' => 'Pereira']);
        Ciudad::create(['nombre' => 'Bogota']);
        Ciudad::create(['nombre' => 'Cali']);
        Ciudad::create(['nombre' => 'Medellin']);
        Ciudad::create(['nombre' => 'Manizales']);
    }
}
