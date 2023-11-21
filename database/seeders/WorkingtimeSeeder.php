<?php

namespace Database\Seeders;

use App\Models\workingtime;
use Illuminate\Database\Seeder;

class WorkingtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workingtimes = [
            [
                'employee_id' => '1',
                'date' => '20-03-2023',
                'start_time' => '08:50',
                'finish_time' => '18:50',
            ],
        ];
        foreach ($workingtimes as $workingtime) {
            workingtime::create($workingtime);
        }
    }
}
