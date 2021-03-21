<?php

namespace Tests\Feature\Controllers\Auth;

use App\Models\User;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $this->postJson(route('login', [
            'email' => 'russel.beer@gmail.com',
            'password' => 'password'
        ]))->assertJsonFragment([
            'email' => 'russel.beer@gmail.com'
        ]);
        $user = auth()->user();
        $this->assertNotNull($user);
    }

    public function testLoginFails()
    {
        $this->postJson(route('login', [
            'email' => 'russel.beer@gmail.com',
            'password' => 'password1'
        ]))->assertJsonFragment([
            'email' => 'Invalid Email or Password'
        ]);

        $user = auth()->user();
        $this->assertNull($user);
    }
}
