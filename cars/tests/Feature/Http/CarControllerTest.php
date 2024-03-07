<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_ScheduleRoute(): void
    {
        $requestData = [
            'userID' => 1,
            'regNo' => 'ABC 123',
            'date' => '2024-05-05'
        ];
        $response = $this->post('schedule', $requestData);
        $response->assertStatus(302);
        $this->assertDatabaseHas('cars', [
            'regnr' => 'ABC 123',
            'datum' => '2024-05-05'
        ]);
    }
}
