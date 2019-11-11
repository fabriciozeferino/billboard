<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('projects')->insert([
                [
                    'owner_id' => 1,
                    'title' => $faker->sentence,
                    'notes' => $faker->sentence,
                    'description' => $faker->sentence,
                    'created_at' => now(),
                ]
            ]);
        }
    }
}
