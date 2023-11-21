<?php

namespace Database\Seeders;

use App\Models\categorie;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => '0',
                'name' => 'Alles',
            ],
            [
                'name' => 'Bomen',
            ],
            [
                'name' => 'Heesters',
            ],
            [
                'name' => 'Coniferen',
            ],
            [
                'name' => 'Haagplanten',
            ],
            [
                'name' => 'Moerasplanten',
            ],
        ];
        foreach ($categories as $categorie) {
            categorie::create($categorie);
        }
    }
}
