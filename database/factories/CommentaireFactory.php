<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use \Illuminate\Support\Facades\DB;

$factory->define(
    \App\Models\Commentaire::class,
    function (Faker\Generator $faker) {
        return [
            'titre' => $faker->name,
            'body' => $faker->text,
            'auteur' => 'Etienne',
            'auteur_id' => 1,
            'jeu_id' => random_int(DB::table('jeux')->min('id'), DB::table('jeux')->max('id')),
        ];
    }
);
