<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,20) as $index) 
        {
            DB::table('orders')->insert(
                [
                    'customer_id' => $faker->numberBetween(1,20),
                    'order_date' => $faker->date('Y-m-d'),  
                    'total_price' => $faker->numberBetween(1000, 5000000),
                    'status' => $faker->randomelement([
                        'Pending',
                        'Completed'
                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
                );
        }
    }
}
