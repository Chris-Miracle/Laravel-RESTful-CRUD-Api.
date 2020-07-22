<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Faker\Generator as Faker;

$factory->define(App\Models\Member::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'email' => $faker->text(15),
        'phone' => $faker->text(8),
        'address' => $faker->text(20),
        'quote' => $faker->text(150)
    ];
});
