<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RestaurantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // use RefreshDatabase;

    public function testReserve()
    {
        // ユーザ作成
        $user = User::factory()->create([
            'name'=>'hoge',
            'email'=>'hoge@gmail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 0
        ]);

        // ログイン
        $response = $this->post('login', [
            'email' => 'hoge@gmail.com',
            'password' => 'password'
        ]);

        // 認証チェック
        $this->assertTrue(Auth::check());

        // レストラン予約
        $response = $this
        ->from(route('restaurants.done'))
        ->post(route('restaurants.reserve'), [
            'user_id' => $user->id,
            'restaurant_id' => 1,
            'date' => '2022-2-12',
            'time' => '12:59',
            'number' => 4
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('login');

        $response->assertRedirect('done');

        // 予約登録チェック
        $this->assertDatabaseHas('reservations', ['user_id' => $user->id]);

        // ユーザ削除
        User::where('id', $user->id)
        ->delete();
    }
}
