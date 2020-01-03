<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Post\Tag::class, function (Faker $faker) {

	$title = $faker->unique()->word(5);

    return [
        'name' => $title,
        'slug' => Str::slug($title)
    ];
});
