<?php


use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 30),
        'owner_id' => factory(App\User::class)->create(),
        'description' => $faker->text($maxNbChars = 100),
        'notes' => $faker->paragraph(3),
    ];

});
