<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 30) ,
        'description' => $faker->paragraph,
        'owner_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];

});
