<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'price' => Str::random(10),
            'image' => Str::random(10),
            'height_cm' => Str::random(10),
            'width_cm' => Str::random(10), 
            'depth_cm' => Str::random(10),
            'weight_gr' => Str::random(10),
        ]);
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'price' => Str::random(10),
            'image' => Str::random(10),
            'height_cm' => Str::random(10),
            'width_cm' => Str::random(10), 
            'depth_cm' => Str::random(10),
            'weight_gr' => Str::random(10),
        ]);
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'price' => Str::random(10),
            'image' => Str::random(10),
            'height_cm' => Str::random(10),
            'width_cm' => Str::random(10), 
            'depth_cm' => Str::random(10),
            'weight_gr' => Str::random(10),
        ]);
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'price' => Str::random(10),
            'image' => Str::random(10),
            'height_cm' => Str::random(10),
            'width_cm' => Str::random(10), 
            'depth_cm' => Str::random(10),
            'weight_gr' => Str::random(10),
        ]);
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'price' => Str::random(10),
            'image' => Str::random(10),
            'height_cm' => Str::random(10),
            'width_cm' => Str::random(10), 
            'depth_cm' => Str::random(10),
            'weight_gr' => Str::random(10),
        ]);
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'price' => Str::random(10),
            'image' => Str::random(10),
            'height_cm' => Str::random(10),
            'width_cm' => Str::random(10),
            'depth_cm' => Str::random(10),
            'weight_gr' => Str::random(10),
        ]);
    }
}
