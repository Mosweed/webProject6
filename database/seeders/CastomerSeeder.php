<?php

namespace Database\Seeders;

use App\Models\castomer;
use Illuminate\Database\Seeder;

class CastomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        function Ean8sum()
        {
            // $ean8 = preg_replace('/\D/', '', $ean8);

            $prefix = '24';

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

        $castomers = [
            [
                'firstname' => 'winkel',
                'lastname' => 'klant',
                'customer_number' => Ean8sum(),

            ],
            [
                'firstname' => 'Jan',
                'lastname' => 'Janssen',
                'address' => 'test 1',
                'city' => 'test',
                'zipcode' => '6035GG',
                'phonenumber' => '615652866',
                'country' => 'Nederland',
                'user_id' => 1,
                'customer_number' => Ean8sum(),
            ],
        ];

        foreach ($castomers as $castomer) {
            castomer::create($castomer);
        }

    }
}
