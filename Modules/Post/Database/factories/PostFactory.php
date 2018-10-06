<?php

use Faker\Generator as Faker;

$factory->define(Modules\Post\Model\Post::class, function (Faker $faker) {

    return [
        'content' => $faker->text($maxNbChars = 200),
        'slug' => $faker->word,
        'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'created_by' => 1,
        'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_by' => 1,
    ];
});