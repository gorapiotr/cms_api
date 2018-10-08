<?php

use Faker\Generator as Faker;

$factory->define(Modules\Post\Model\Post::class, function (Faker $faker) {

    return [
        'main_image' => 'https://firebasestorage.googleapis.com/v0/b/cmsimage-9ec21.appspot.com/o/img_1.jpg?alt=media&token=2c08de7c-f616-482a-9b75-aeebd8c9b584',
        'main_image_type' => 'url',
        'lead' => $faker->text($maxNbChars = 30),
        'content' => $faker->text($maxNbChars = 200),
        'slug' => $faker->word,
        'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'created_by' => 1,
        'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_by' => 1,
    ];
});