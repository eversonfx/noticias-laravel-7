<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Secao;
use Faker\Generator as Faker;

$factory->define(Secao::class, function (Faker $faker) {
    return [
        'nome' => $faker->sentence
    ];
});
