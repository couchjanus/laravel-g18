<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $user_ids = App\User::pluck('id');
    $post_ids = App\Post::pluck('id');
    $comment_ids = App\Comment::pluck('id');
    return [
        'body' => $faker->sentence(),
        'creator_id' => $user_ids->random(),
        'creator_type' => 'App\User',
        'commentable_id' => $post_ids->random(),
        'commentable_type' => 'App\Post',
        'parent_id' => $comment_ids->random()

    ];
});
