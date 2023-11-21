<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        function EmployeeEan8sum()
        {
            // $ean8 = preg_replace('/\D/', '', $ean8);

            $prefix = '12';

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

        $employees = [
            [
                'firstname' => 'yazan',
                'lastname' => 'sweed',
                'address' => 'test',
                'city' => 'test',
                'zipcode' => '6035GG',
                'housenumber' => '1',
                'phonenumber' => '615652866',
                'user_id' => 2,
                'employee_number' => EmployeeEan8sum(),
            ],
            [
                'firstname' => 'yazan',
                'lastname' => 'sweed',
                'address' => 'test',
                'city' => 'test',
                'zipcode' => '6035GG',
                'housenumber' => '1',
                'phonenumber' => '615652866',
                'user_id' => 3,
                'employee_number' => EmployeeEan8sum(),
            ],

            [
                'firstname' => 'yazan',
                'lastname' => 'sweed',
                'address' => 'test',
                'city' => 'test',
                'zipcode' => '6035GG',
                'housenumber' => '1',
                'phonenumber' => '615652866',
                'user_id' => 4,
                'employee_number' => EmployeeEan8sum(),
            ],
            [
                'firstname' => 'yazan',
                'lastname' => 'sweed',
                'address' => 'test',
                'city' => 'test',
                'zipcode' => '6035GG',
                'housenumber' => '1',
                'phonenumber' => '615652866',
                'user_id' => 5,
                'employee_number' => EmployeeEan8sum(),
            ],

        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }

    }
}
