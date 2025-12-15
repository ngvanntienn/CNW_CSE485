<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'genre' => $faker->randomElement([
                    'Công nghệ',
                    'Văn học',
                    'Toán học',
                    'Sinh học',
                ]),
                'publication_year' => $faker->year,
                'isbn' => $faker->isbn13,
                'cover_image_url' => $faker->imageUrl(200, 300, 'books', true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
