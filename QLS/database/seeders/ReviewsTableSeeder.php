<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('reviews')->insert([
                'book_id' => $faker->numberBetween(1,20),
                'user_id' => $faker->numberBetween(1,100),
                'rating' => $faker->numberBetween(1,5),
                'review_text' => $faker->paragraph(5),
                'review_date' => $faker->date('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
