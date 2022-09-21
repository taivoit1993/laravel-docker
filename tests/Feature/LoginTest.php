<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->postJson(
            'api/login',
            [
                "email" => "taivo.mile@gmail.com",
                "password" => "123456",
                "remeber_me" => 1
            ],
            [
                "Accept" => "application/json"
            ]
        );
        $response
            ->assertStatus(200)
            ->assertJsonPath('data.name', 'tai vo')
            ->assertJsonPath('data.token', fn ($token) => strlen($token) > 0)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('data.name', 'tai vo')
                    ->has('data.token')
                    ->etc()
            );
    }
}
