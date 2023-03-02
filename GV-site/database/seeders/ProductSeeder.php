<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph(2),
                'price' => $faker->randomFloat(2, 10, 100),
                'image' => $faker->imageUrl(640, 480),
            ]);
        }
    }
}
