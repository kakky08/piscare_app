<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use SebastianBergmann\Environment\Console;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    // use RefreshDatabase;

    public function testIndex()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
        ->get(route('home.index'));

        $response->assertStatus(200)->assertViewIs('mypage.home.home');
    }
}
