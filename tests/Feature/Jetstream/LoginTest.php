<?php

namespace Tests\Feature\Jetstream;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * @return void
     */
    public function testLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testLoginAsUser()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('dashboard');
    }
}
