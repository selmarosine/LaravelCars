<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarcontrollerTest extends TestCase
{
    use RefreshDatabase;

    public function test_ScheduleRoute(): void
    {
        $requestData = [
            'regNo' => 'abc',
            'date' => '2024-05-05',
        ];
        $response = $this->post('schedule', $requestData);
        $response->assertStatus(302);
        $this->assertDatabaseHas('cars', [
            'regnr' => 'abc',
            'datum' => '2024-05-05',
        ]);
    }
}
