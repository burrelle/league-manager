<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipantsTest extends TestCase
{
    public function testGetAllParticipants()
    {
    	 $response = $this->json('GET', 'api/participants');
    	 $response->assertStatus(200);
    }
}
