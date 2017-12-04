<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];

});


    /*crear productos*/
$factory->define(App\Producto::class, function (Faker\Generator $faker) {


    return [
        'nombre' => $faker->name,
        'url_imagen' => "cajax.jpg",
        'precio_carulla' => $faker->numberBetween($min = 1000, $max = 9000),
            'precio_exito' => $faker->numberBetween($min = 1000, $max = 9000),
            'precio_jumbo' => $faker->numberBetween($min = 1000, $max = 9000),
            'precio_euro' => $faker->numberBetween($min = 1000, $max = 9000),
            'precio_makro' => $faker->numberBetween($min = 1000, $max = 9000),
            'link_carulla' => $faker->numberBetween($min = 1000, $max = 9000),
            'link_exito' => $faker->imageUrl('160', '240'),
            'link_jumbo' => $faker->imageUrl('160', '240'),
            'link_euro' => $faker->imageUrl('160', '240'),
            'link_makro' => $faker->imageUrl('160', '240'),
            'prioridad' => 3,
            'fecha_inicio' =>  $faker->date($format = 'Y-m-d', $max = 'now'),
            'fecha_fin' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'categoria_id' => 7,
        

    ];
});
