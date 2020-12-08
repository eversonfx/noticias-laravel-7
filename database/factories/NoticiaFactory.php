<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Noticia;
use Faker\Generator as Faker;

$factory->define(Noticia::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence,
        'tags' => $faker->company,
        'destaque' => 0,
        'conteudo' => $faker->paragraph,
        'video_link' => 'https://www.youtube.com/watch?v=GRxofEmo3HA',
        'main_image' => 0,
        'secao_id' => $faker->numberBetween(1, App\Secao::count()),
        'user_id' => $faker->numberBetween(1, App\User::count()),
    ];
});
