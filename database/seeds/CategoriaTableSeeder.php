<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// categoria carnes
        $carnes = Categoria::create(['nombre' => 'Carnes']);
        Categoria::create(['nombre' => 'Pollo',
    					   'categoria_padre' => $carnes->categoria_id]);

        Categoria::create(['nombre' => 'Res',
    					   'categoria_padre' => $carnes->categoria_id]);

        Categoria::create(['nombre' => 'Cerdo',
    					   'categoria_padre' => $carnes->categoria_id]);

        Categoria::create(['nombre' => 'Pescado',
    					   'categoria_padre' => $carnes->categoria_id]);

         Categoria::create(['nombre' => 'Embutidos',
    					   'categoria_padre' => $carnes->categoria_id]);

         //categoria  frutas y verduras 

          $frutas = Categoria::create(['nombre' => 'Frutas']);
        Categoria::create(['nombre' => 'Pollo',
    					   'categoria_padre' => $frutas->categoria_id]);
        Categoria::create(['nombre' => 'Pollo',
    					   'categoria_padre' => $frutas->categoria_id]);


        // categoria licores 
         $licores = Categoria::create(['nombre' => 'Licores']);
        Categoria::create(['nombre' => 'Vino',
    					   'categoria_padre' => $licores->categoria_id]);
        Categoria::create(['nombre' => 'Whisky',
    					   'categoria_padre' => $licores->categoria_id]);
        Categoria::create(['nombre' => 'Ron',
    					   'categoria_padre' => $licores->categoria_id]);
        Categoria::create(['nombre' => 'Aguardiente',
    					   'categoria_padre' => $licores->categoria_id]);
        Categoria::create(['nombre' => 'Cerveza',
    					   'categoria_padre' => $licores->categoria_id]);
         Categoria::create(['nombre' => 'Cocteles',
    					   'categoria_padre' => $licores->categoria_id]);
         Categoria::create(['nombre' => 'Otros Licores',
    					   'categoria_padre' => $licores->categoria_id]);


         // salud
         $salud = Categoria::create(['nombre' => 'Salud']);
         Categoria::create(['nombre' => 'Higiene Personal',
    					   'categoria_padre' => $salud->categoria_id]);
         Categoria::create(['nombre' => 'Cuidado Femenino',
    					   'categoria_padre' => $salud->categoria_id]);
         Categoria::create(['nombre' => 'Cuidado Masculino',
    					   'categoria_padre' => $salud->categoria_id]);
         Categoria::create(['nombre' => 'Droguería',
    					   'categoria_padre' => $salud->categoria_id]);



         // moda
         $moda = Categoria::create(['nombre' => 'Moda']);
         Categoria::create(['nombre' => 'Moda Hombre',
    					   'categoria_padre' => $moda->categoria_id]);
         Categoria::create(['nombre' => 'Moda Mujer',
    					   'categoria_padre' => $moda->categoria_id]);
         Categoria::create(['nombre' => 'Moda Niños',
    					   'categoria_padre' => $moda->categoria_id]);
         Categoria::create(['nombre' => 'Bolsos y/o Maletas',
    					   'categoria_padre' => $moda->categoria_id]);
         Categoria::create(['nombre' => 'Perfumes',
    					   'categoria_padre' => $moda->categoria_id]);
         Categoria::create(['nombre' => 'Otros Accesorios(Gafas,Relojes,pulseras,etc)',
    					   'categoria_padre' => $moda->categoria_id]);


         // hogar 

          $hogar = Categoria::create(['nombre' => 'Hogar']);
         Categoria::create(['nombre' => 'Alcoba (Camas, cobijas , nocheros, etc)',
    					   'categoria_padre' => $hogar->categoria_id]);
         Categoria::create(['nombre' => 'Baño (Baños, cortinas, toallas, etc)',
    					   'categoria_padre' => $hogar->categoria_id]);
         Categoria::create(['nombre' => 'Sala (Mesa, comedores, sillas, etc)',
    					   'categoria_padre' => $hogar->categoria_id]);
          Categoria::create(['nombre' => 'Cocina (Cajones, organizador, locero, etc)',
    					   'categoria_padre' => $hogar->categoria_id]);
          Categoria::create(['nombre' => 'Exterior (Cuerdas, ganchos, etc)',
    					   'categoria_padre' => $hogar->categoria_id]);
           Categoria::create(['nombre' => 'Decoración (Cuadros, persianas, cortinas, etc)',
    					   'categoria_padre' => $hogar->categoria_id]);
           Categoria::create(['nombre' => 'Aseo Hogar',
    					   'categoria_padre' => $hogar->categoria_id]);



           //tecnologica
           $tecnologica = Categoria::create(['nombre' => 'Tecnologia']);
          Categoria::create(['nombre' => 'Computadores',
    					   'categoria_padre' => $tecnologica->categoria_id]);
          Categoria::create(['nombre' => 'Tablets',
    					   'categoria_padre' => $tecnologica->categoria_id]);
          Categoria::create(['nombre' => 'Celulares',
    					   'categoria_padre' => $tecnologica->categoria_id]);
          Categoria::create(['nombre' => 'Audio',
    					   'categoria_padre' => $tecnologica->categoria_id]);
          Categoria::create(['nombre' => 'Consolas (Videojuegos)',
    					   'categoria_padre' => $tecnologica->categoria_id]);
          Categoria::create(['nombre' => 'Televisores',
    					   'categoria_padre' => $tecnologica->categoria_id]);
          Categoria::create(['nombre' => 'Cámaras',
    					   'categoria_padre' => $tecnologica->categoria_id]);
          Categoria::create(['nombre' => 'Impresoras',
    					   'categoria_padre' => $tecnologica->categoria_id]);


          //electrodomesticos 
           $electrodomesticos = Categoria::create(['nombre' => 'Electrodomesticos']);
          Categoria::create(['nombre' => 'Nevera',
    					   'categoria_padre' => $electrodomesticos->categoria_id]);
          Categoria::create(['nombre' => 'Lavadora',
    					   'categoria_padre' => $electrodomesticos->categoria_id]);
          Categoria::create(['nombre' => 'Estufa',
    					   'categoria_padre' => $electrodomesticos->categoria_id]);
          Categoria::create(['nombre' => 'Secadora',
    					   'categoria_padre' => $electrodomesticos->categoria_id]);
          Categoria::create(['nombre' => 'Teléfonos',
    					   'categoria_padre' => $electrodomesticos->categoria_id]);




          	//mercado
           $mercado = Categoria::create(['nombre' => 'Mercado']);
          Categoria::create(['nombre' => 'Despensa',
    					   'categoria_padre' => $mercado->categoria_id]);
           Categoria::create(['nombre' => 'Bebidas',
    					   'categoria_padre' => $mercado->categoria_id]);
           Categoria::create(['nombre' => 'Snack',
    					   'categoria_padre' => $mercado->categoria_id]);
           Categoria::create(['nombre' => 'Refrigerado',
    					   'categoria_padre' => $mercado->categoria_id]);
           Categoria::create(['nombre' => 'Panaderia y Reposteria',
    					   'categoria_padre' => $mercado->categoria_id]);
            Categoria::create(['nombre' => 'Mascotas',
    					   'categoria_padre' => $mercado->categoria_id]);
             Categoria::create(['nombre' => 'Lacteos',
    					   'categoria_padre' => $mercado->categoria_id]);


             //jugueteria y deportes 
             $jugueteria = Categoria::create(['nombre' => 'Jugueteria y deportes']);
          Categoria::create(['nombre' => 'Juguetes para niños',
    					   'categoria_padre' => $jugueteria->categoria_id]);
          Categoria::create(['nombre' => 'juguetes para niñas',
    					   'categoria_padre' => $jugueteria->categoria_id]);
           Categoria::create(['nombre' => 'Bebes',
    					   'categoria_padre' => $jugueteria->categoria_id]);
           Categoria::create(['nombre' => 'Deportes con balón',
    					   'categoria_padre' => $jugueteria->categoria_id]);
           Categoria::create(['nombre' => 'Bicicleta',
    					   'categoria_padre' => $jugueteria->categoria_id]);
           Categoria::create(['nombre' => 'Gimnasio',
    					   'categoria_padre' => $jugueteria->categoria_id]);
           Categoria::create(['nombre' => 'Accesorios Deportivos',
    					   'categoria_padre' => $jugueteria->categoria_id]);



        
    }
}
