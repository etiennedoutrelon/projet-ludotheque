<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use \Illuminate\Support\Facades\DB;


$factory->define(
    \App\Models\Tag::class,
    function (Faker\Generator $faker) {
        $tags = array('FPS', 'Open World', 'TPS', 'RPG', 'Mobile', 'BattleRoyal');
        return [
            'label' => $faker->unique()->randomElement($tags),
        ];
    }
);
