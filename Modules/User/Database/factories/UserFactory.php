<?php

use Faker\Generator as Faker;

$factory->define(Modules\User\Model\User::class, function (Faker $faker) {

    $email = $faker->unique()->safeEmail;

    return [
        'name' => $faker->name(),
        'email' => $email,
        'password' => $email,
        'remember_token' => str_random(10),
    ];
});