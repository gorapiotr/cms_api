<?php

use Faker\Generator as Faker;

$factory->define(Modules\User\Model\User::class, function (Faker $faker) {

    $email = $faker->unique()->safeEmail;

    return [
        'name' => $faker->name(),
        'email' => $email,
        'password' => $email,
        'avatar' => 'https://firebasestorage.googleapis.com/v0/b/cmsimage-9ec21.appspot.com/o/pic-1.png?alt=media&token=12737b0d-2d61-4c27-96ee-3f35f3f6694c',
        'avatar_type' => 'url',
        'remember_token' => str_random(10),
    ];
});