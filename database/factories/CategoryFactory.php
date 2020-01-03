<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Post\Category::class, function (Faker $faker) {

	$title = $faker->sentence(4);

    return [
        'name' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->text(500),
    ];
});
