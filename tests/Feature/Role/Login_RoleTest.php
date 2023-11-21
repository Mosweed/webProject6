<?php

namespace Tests\Feature\Role;

use App\Models\User;
use Tests\TestCase;

class Login_RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create(
            [
                'name' => 'Test User',
                'role' => '3',
            ]
        );
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertStatus(200);
    }
}
