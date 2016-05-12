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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'idrole' => $faker->randomElement($array = array (4,5)),
        'remember_token' => str_random(10),
    ];
});
/*
 * Tabla catalogo
 */
$factory->define(App\Catalogo::class, function ($faker) {
    return [
        'idtable' => $faker->randomDigitNotNull,
        'iditem' => $faker->randomDigitNotNull,
        'codigo' => $faker->name,
        'nombre' => $faker->name,
        'descripcion' => $faker->boolean,
        'remember_token' => str_random(10),

    ];
});