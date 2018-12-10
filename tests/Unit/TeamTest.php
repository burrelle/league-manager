<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TeamTest extends TestCase
{
    use DatabaseMigrations;

    public function testTeamHasManyParticipants()
    {
        $team = factory(App\Team::class)->create();
        $participants = factory(App\Participant::class, 5)->create(['team_id' => $team->id ]);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $team->participants);
    }
}
