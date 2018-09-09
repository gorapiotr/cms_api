<?php

use Faker\Generator as Faker;

$factory->define(Modules\Settings\Model\Settings::class, function (Faker $faker) {

    return [
        'key' => $faker->word,
        'value' => $faker->text($maxNbChars = 200),
        'type' => $faker->randomElement(['page']),
        'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'created_by' => 1,
        'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_by' => 1,
    ];
});