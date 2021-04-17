<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_login_an_user()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->post(route('user.login'), [
            'email' => $user->email,
            'password' => bcrypt($user->password)
        ])->assertRedirect(route('user.dashboard'));
    }

    public function test_can_register_an_user()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make();
        $response = $this->post(route('user.register'), [
            'email' => $user->email,
            'password' => $user->password
        ])->assertRedirect(route('user.dashboard'));
    }
}
