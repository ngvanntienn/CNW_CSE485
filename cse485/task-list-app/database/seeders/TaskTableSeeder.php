<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Faker\Factory as Faker;

class TaskTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Task::create([
                'title'            => $faker->sentence(),
                'description'      => $faker->paragraph(),
                'long_description' => $faker->optional()->text(),
                'completed'        => $faker->boolean(),
            ]);
        }
    }
}
