<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

// Test class for whoop Auth Controller
class WhoopAuthControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test successful redirect .
     */
    public function testSuccessfulRedirectToWhoop()
    {
        $user = User :: factory() -> create();
        $this -> actingAs($user);
        
        $response = $this -> get(route('whoop.authorize'));
        $response -> assertRedirect();
        $this-> assertNotEmpty(session('oauth2state'), 'The session should have oauth2state set.');
    }
}