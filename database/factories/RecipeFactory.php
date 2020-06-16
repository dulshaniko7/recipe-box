<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    return [
'user_id' => 1,
	    'name' => $faker->sentence,
	    'description' => $faker->paragraph(mt_rand(10,20)),
		    'image' => 'test.png'
    ];
});
