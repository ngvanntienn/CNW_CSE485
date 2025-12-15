<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,20) as $index) 
        {
             $startDate = $faker->date('Y-m-d');
            $endDate = $faker -> date('Y-m-d', $startDate);
            DB::table('projects')->insert(
                [
                   
                    'name' => $faker->randomElement([
                        'Hệ thống quản lý khách hàng',
                        'Hệ thống quản lý nhân viên',
                        'Hệ thống quản lý khách sạn',
                        'Hệ thống quản lý quán hát',
                    ]),  
                    'start_date' =>  $startDate,
                    'end_date' => $endDate,
                    'budget' => $faker->numberBetween(1000,50000000),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
                );
        }
    }
}
