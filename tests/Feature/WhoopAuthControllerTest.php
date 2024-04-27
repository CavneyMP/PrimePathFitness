<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class WhoopAuthControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testSuccessfulRedirectToWhoop()
    {
        $user = User :: factory() -> create();
        $this -> actingAs($user);
        
        $response = $this -> get(route('whoop.authorize'));
        $response -> assertRedirect();
        $this-> assertNotEmpty(session('oauth2state'), 'The session should have oauth2state set.');
    }
}