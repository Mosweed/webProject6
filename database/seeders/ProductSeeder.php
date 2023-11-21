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

        function ProductEan8bum()
        {
            // $ean8 = preg_replace('/\D/', '', $ean8);

            $prefix = '87';

            $ean8 = $prefix.mt_rand(10000, 99999);

            $digits = str_split($ean8);

            $odd = 0;
            $even = 0;
            $sum = 0;

            for ($i = count($digits) - 1; $i >= 0; $i--) {

                if ($i % 2 == 0) {
                    $odd += $digits[$i];
                } else {
                    $even += $digits[$i];
                }

            }
            $sum = $odd * 3 + $even * 1;
            $checksum = $ean8.(10 - ($sum % 10)) % 10;

            return $checksum;
        }

        for ($i = 0; $i < 20; $i++) {

            DB::table('products')->insert([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph(2),
                'selling_price' => $faker->randomFloat(2, 0, 1000),
                'purchase_price' => $faker->randomFloat(2, 0, 1000),
                'status' => 'published',
                'barcode' => ProductEan8bum(),
                'stock' => $faker->numberBetween(0, 100),
                'image' => $faker->imageUrl(640, 480),
                'height_cm' => $faker->numberBetween(1, 100),
                'width_cm' => $faker->numberBetween(1, 100),
                'depth_cm' => $faker->numberBetween(1, 100),
                'weight_gr' => $faker->numberBetween(1, 100),
                'categorie_id' => $faker->numberBetween(2, 6),
            ]);
        }
    }
}
