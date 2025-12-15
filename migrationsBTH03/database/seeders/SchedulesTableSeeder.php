<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1,20) as $index)
        {
            DB::table('schedules')->insert([
                'classroom_id' => $faker->numberBetween(1,20),
                'course_name' => $faker->randomElement([
                    'Cơ sở dữ liệu',
                    'Lập trình Windows',
                    'Hệ quản trị cơ sở dữ liệu',
                    'Công nghệ Web'
                ]),
                'day_of_week' => $faker->randomElement([
                    'Thứ hai',
                    'Thứ ba',
                    'Thứ Tư',
                    'Thứ Năm',
                    'Thứ Sáu'
                ]),
                'time_slot' => $faker->randomElement([
                    '07:30 - 09:30',
                    '09:45 - 11:45',
                    '13:00 - 15:00',
                    '15:15 - 17:15'
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
