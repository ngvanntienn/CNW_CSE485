<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,20) as $index) 
        {
            DB::table('classrooms')->insert(
                [
                    'room_number' => $faker->randomElement(['A', 'B', 'C', 'D']).$faker->numberBetween(1,100),
                    'capacity' => $faker->numberBetween(1,100),
                    'building' => 'Tòa nhà '.$faker->randomElement(['A', 'B', 'C', 'D']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
                );
        }
    }
}
