<?php

use Faker\Generator as Faker;

$factory->define(App\Participant::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
	    'lastName' => $faker->lastName,
	    'emailAddress' => $faker->unique()->safeEmail,
	    'streetAddress' => $faker->streetAddress,
	    'city' => $faker->city,
	    'state' => $faker->stateAbbr,
	    'zipCode' => $faker->postcode,
	    'phoneNumber' => $faker->phoneNumber,
    ];
});
