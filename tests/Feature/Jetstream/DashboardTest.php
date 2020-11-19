<?php

namespace Tests\Feature\Jetstream;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * @return void
     */
    public function testDashboard()
    {
        $user = User::factory()->create();

        $team = $user->teams()->create([
            "name" => "User team",
            "personal_team" => true,
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testTeamDashboard()
    {
        $user = User::factory()->create();

        $team = $user->teams()->create([
            "name" => "User team",
            "personal_team" => true,
        ]);

        $response = $this->actingAs($user)->get('/teams/' . $team->id);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCreateTeamDashboard()
    {
        $user = User::factory()->create();

        $team = $user->teams()->create([
            "name" => "User team",
            "personal_team" => true,
        ]);

        $response = $this->actingAs($user)->get('/teams/create');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testUserProfile()
    {
        $user = User::factory()->create();

        $team = $user->teams()->create([
            "name" => "User team",
            "personal_team" => true,
        ]);

        $response = $this->actingAs($user)->get('/user/profile');

        $response->assertStatus(200);
    }
}
