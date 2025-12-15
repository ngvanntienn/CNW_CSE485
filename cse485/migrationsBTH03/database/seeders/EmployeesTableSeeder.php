<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,20) as $index) 
        {
            DB::table('employees')->insert(
                [
                    'name' => $faker->name,
                    'position' => $faker->randomElement([
                        'Lập trình viên',
                        'Cộng tác viên',
                        'Sinh viên',
                        'Học viên',
                        'Web dev'
                    ]),
                    'project_id' => $faker->numberBetween(1,20),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
                );
        }
    }
}
