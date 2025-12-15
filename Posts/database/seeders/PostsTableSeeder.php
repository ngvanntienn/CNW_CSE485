<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('posts')->insert([
                'title' => $faker->sentence(6),
                'body' => $faker->paragraph(2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
