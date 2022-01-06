<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    // use RefreshDatabase;

    public function testLogin()
    {
        // ユーザ作成
        $user = User::factory()->create([
            'name'=>'hoge',
            'email'=>'hoge@gmail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'=>0
        ]);

        $this->assertFalse(Auth::check());

        $response = $this->post('login', [
            'email' => 'hoge@gmail.com',
            'password' => 'password'
        ]);

        $this->assertTrue(Auth::check());

        $response->assertRedirect('/');
    }

    public function testRestaurant()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response = $this->get(route('restaurants.datail', ['id' => 1]));

        $response->assertStatus(200);
    }
}
