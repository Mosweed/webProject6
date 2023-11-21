<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'user',
            ],
            [
                'name' => 'employee',
            ],
            [
                'name' => 'admin',
            ],
            [
                'name' => 'humanresources',

            ],
            [
                'name' => 'management',
            ],

        ];
        foreach ($roles as $role) {
            role::create($role);
        }
    }
}
