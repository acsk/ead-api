<?php

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{

    public function test_fail_auth()

    {
        $response = $this->postJson('/auth',[]);
        $response->assertStatus(422);
    }

    public function test_logout_success_auth()

    {   $user = User::factory()->create();
        $token = $user->createToken('teste')->plainTextToken;

        $response = $this->postJson('/logout',[],[
            'Authorization' => 'Bearer ' . $token
        ]);
        $response->assertStatus(200);
    }

    public function test_get_user_success_auth()

    {
        $user = User::factory()->create();
        $token = $user->createToken('teste_device')->plainTextToken;

        $response = $this->getJson('/me',[
            'Authorization' => 'Bearer ' . $token
        ]);
        $response->assertStatus(200);
    }

    public function test_login_success_auth()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/auth',[
            'email' => $user->email,
            'password' => 'password',
            'device_name' => 'teste'
        ]);
        $response->assertStatus(200);
    }
}
