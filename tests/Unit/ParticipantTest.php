<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipantTest extends TestCase
{
    use DatabaseMigrations;

    public function testParticipantBelongsToTeam()
    {
        $participant = factory(App\Participant::class)->make();
        $this->assertInstanceOf(App\Team::class, $participant->team);
    }
}
