<?php

use Faker\Generator as Faker;
use App\Participant;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'teamName' => $faker->firstName,
        'captain' => $faker->randomElement(DB::table('Participants')->pluck('id')->toArray()),
        'league' => $faker->jobTitle,
    ];
});
