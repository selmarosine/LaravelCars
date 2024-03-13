<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

/*** To run this test, please comment out the email-fields in UserFactory.php ***/

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     *
     * @return void
     */
    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'name' => 'testuser',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'name' => 'testuser',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/show');
        $this->assertAuthenticatedAs($user);
    }

    /**
     *
     *
     * @return void
     */
    public function test_user_cannot_login_with_incorrect_credentials()
    {
        $response = $this->post('/login', [
            'name' => 'invaliduser',
            'password' => 'invalidpassword',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('error', 'Wrong credentials');
        $this->assertGuest();
    }
}