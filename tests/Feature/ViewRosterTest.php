<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewRosterTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->team = factory(App\Team::class)->create();
    }

    public function testCanViewCreatedTeam()
    {
        $response = $this->actingAs(factory(App\User::class)->create())->get('/rosters');
        $response->assertStatus(200);
        $response->assertSee('Roster by Team');
    }

    public function testUnauthorizedUserCannotViewCreatedTeam()
    {
        $response = $this->get('/rosters');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
