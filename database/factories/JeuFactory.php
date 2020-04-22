<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(
    App\Models\Jeu::class,
    function (Faker\Generator $faker) {
        $createAt = $faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
            $timezone = date_default_timezone_get()
        );
        return [
            'nom' => $faker->unique()->randomElement($array = array('PES','Clash of Clan','Warcraft','NBA 2K','Mario et Sonic','Doodle Jump','Flappy Bird','Angry Bird')),
            'date_sortie' => $faker->dateTime->format('Y-m-d'),
            'age_min' => $faker->randomElement($array = array(3, 8, 12, 18)),
            'nb_joueur' => $faker->randomDigit,
            'duree_partie' => $faker->randomElement($array = array('10 min', '1 heure', '20 min')),
            'description' => $faker->text,
            'created_at' => $createAt,
            'updated_at' => $faker->dateTimeInInterval(
                $startDate = $createAt,
                $interval = $createAt->diff(new DateTime('now'))->format("%R%a days"),
                $timezone = date_default_timezone_get()
            ),
        ];
    }
);
