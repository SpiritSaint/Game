<?php

namespace Tests\Feature\Jetstream;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * @return void
     */
    public function testCreateUser()
    {
        $user = User::factory()->make();

        $response = $this->post('/register', [
            "name" => $user->name,
            "email" => $user->email,
            "password" => "secure_password",
            "password_confirmation" => "secure_password",
        ]);

        $response->assertRedirect("/dashboard");
    }
}
