<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Klant',
                'email' => 'Klant@gv.nl',
                'password' => bcrypt('123456'),
                'role' => 1,
            ],
            ['name' => 'mendewerker',
                'email' => 'medewerker@gv.nl',
                'password' => bcrypt('123456'),
                'role' => 2,
            ],
            ['name' => 'Admin',
                'email' => 'admin@gv.nl',
                'password' => bcrypt('123456'),
                'role' => 3,
            ],
            ['name' => 'personeelszaken',
                'email' => 'personeel@gv.nl',
                'password' => bcrypt('123456'),
                'role' => 4,
            ],
            ['name' => 'management',
                'email' => 'management@gv.nl',
                'password' => bcrypt('123456'),
                'role' => 5,
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
