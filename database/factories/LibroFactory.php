<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Libro;
use Faker\Factory;
//use Faker\Generator as Faker;
$faker=Factory::create('es_ES');
//$factory->define(Libro::class, function (Faker $faker) {
$factory->define(Libro::class, function ($faker) {
    return [
        'titulo'=>$faker->sentence(3),
        'sinopsis'=>$faker->realText($maxNbChars = 100, $indexSize = 2),
        'pvp'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'stock'=>$faker->numberBetween($min=0, $max=100),
        'isbn'=>$faker->unique()->isbn13
    ];
});
