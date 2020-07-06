<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use \Cviebrock\EloquentSluggable\Services\SlugService;

$factory->define(Post::class, function (Faker $faker) {
    $categoriesIds = \DB::table('categories')->pluck('id');
    $usersIds = \DB::table('users')->pluck('id');
    $title = $faker->sentence($nbWords = 6, $variableNbWords = true);

    return [
        'title' => $title,
        'slug' => SlugService::createSlug(App\Post::class, 'slug', $title),
        'content' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
        'published' => $faker->randomElement([true,false]),
        'votes' => $faker->randomDigit(),
        'category_id' => $faker->randomElement($categoriesIds),
        'user_id' =>  $faker->randomElement($usersIds),
        "cover_path" => asset("storage/covers/cover.png"),
    ];
});