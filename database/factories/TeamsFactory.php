<?php

use Faker\Generator as Faker;
use App\Participant;

$factory->define(App\Team::class, function (Faker $faker) {
    $faker = \Faker\Factory::create();
	\Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
    
    return [
        'teamName' => $faker->team,
        'league' => $faker->sport,
    ];
});
