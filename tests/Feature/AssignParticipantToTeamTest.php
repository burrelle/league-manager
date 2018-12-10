<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AssignParticipantToTeamTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->team = factory(App\Team::class)->create();
        $this->players = factory(App\Participant::class, 5)->create();
    }

    public function testCanViewAssignPlayers()
    {
        $response = $this->actingAs(factory(App\User::class)->create())->get('/assign');
        $response->assertStatus(200);
        $response->assertSee('Assign a player to team');
    }

    public function testUnauthorizedUserCannontViewAssignPlayers()
    {
        $response = $this->get('/assign');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
