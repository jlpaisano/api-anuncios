<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anuncio;
use Faker\Generator as Faker;

$factory->define(Anuncio::class,
function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'description' => $faker->sentence(20),
        //'image' => $faker->sentence(2),
        'stars' => $faker->numberBetween(1, 5),
        'brand' => $faker->sentence(1),
        'category' => $faker->sentence(1),
        'price' => $faker->numberBetween(10, 5000)        
    ];
});
