<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function(Faker\Generator $faker) {
	$title = $faker->sentence(9);
	return [
		'post_title'   =>  $title,
		'post_body'    =>  $faker->paragraph(2),
		'post_channel' =>  'Laravel',
		'user_id'      =>  1,
		'slug'		   =>  str_slug($title)
	];
});