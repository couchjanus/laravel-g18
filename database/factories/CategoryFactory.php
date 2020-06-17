<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word, // 'aut'
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true), // 'Sit vitae voluptas sint non voluptates.'
        'votes' => $faker->randomDigit(),
    ];
});
