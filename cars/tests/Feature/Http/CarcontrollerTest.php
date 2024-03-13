<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class CarcontrollerTest extends TestCase
{
    use RefreshDatabase;


    //Can't get the test to pass, probably related to userID being a foreign key or something.
    public function test_ScheduleRoute(): void
    {
        //session(['userID' => 1]);
        $user = User::factory()->create(['id' => 1]);
        $requestData = [
            'regNo' => 'ABC',
            'date' => '2025-05-05',
            'userID' => $user->id
        ];
        $response = $this->actingAs($user)->post('schedule', $requestData);
        $response->assertStatus(302);
        $this->assertDatabaseHas('cars', [
            'regnr' => 'ABC',
            'datum' => '2025-05-05',
            'userID' => $user->id
        ]);
    }
}
