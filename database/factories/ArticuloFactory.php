<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articulo;
use Faker\Factory;
$faker=Factory::create('es_ES');

$factory->define(Articulo::class, function ($faker) {
    return [
        'nombre'=>$faker->word,
        'imagen'=>$faker->imageUrl($width=80, $height=80),
        'pvp'=>$faker->randomFloat(2,1,999)
    ];
});
