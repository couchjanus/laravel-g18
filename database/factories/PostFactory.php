<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $categoriesIds = \DB::table('categories')->pluck('id');
    $usersIds = \DB::table('users')->pluck('id');
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'content' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
        'published' => $faker->randomElement([true,false]),
        'votes' => $faker->randomDigit(),
        'category_id' => $faker->randomElement($categoriesIds),
        'user_id' =>  $faker->randomElement($usersIds)
    ];
});