<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use MessageBird\Client as MessageBirdClient;
use Tests\TestCase;
use Twilio\Rest\Client;

class TwilioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTwilio()
    {
        $this->assertTrue(true);
    }
}
