<?php

/* @var $factory Factory */

use App\Task;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'project_id' => factory(App\Project::class)->create(),
        /*'owner_id' => function () {
            return factory(App\User::class)->create()->id;
        },*/
        'completed' => false
    ];
});
