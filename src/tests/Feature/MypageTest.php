<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MypageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // use RefreshDatabase;

        public function testMypage()
    {
        // ユーザ作成
        $user = User::factory()->create([
            'name'=>'hoge',
            'email'=>'hoge@gmail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 0
        ]);

        // 認証チェック
        $this->assertFalse(Auth::check());

        // ログイン
        $response = $this->post('login', [
            'email' => 'hoge@gmail.com',
            'password' => 'password'
        ]);

        // 認証チェック
        $this->assertTrue(Auth::check());
        $response->assertRedirect('/');

        // レストラン予約
        $response = $this
        ->from(route('restaurants.done'))
        ->post(route('restaurants.reserve'), [
            'user_id' => $user->id,
            'restaurant_id' => 1,
            'date' => '2021-2-12',
            'time' => '12:59',
            'number' => 4
        ]);

        // マイページ画面
        $response = $this->get(route('mypage'));
        $response->assertStatus(200);

        // レストラン予約更新
        $response = $this
        ->from(route('mypage'))
        ->post(route('mypage.update'), [
            'user_id' => $user->id,
            'restaurant_id' => 1,
            'date' => '2021-4-20',
            'time' => '13:00',
            'number' => 8
        ]);

        $response->assertRedirect('mypage');

        // レビュー
        $response = $this
        ->post(route('mypage.review'), [
            'rate' => 4,
            'comment' => 'とても美味しいです！',
            'user_id' => $user->id,
            'restaurant_id' => 1
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('mypage.done');
        $response->assertStatus(200);

        // レストラン予約削除
        $response = $this
        ->from(route('mypage'))
        ->post(route('mypage.destroy'), [
            'user_id' => $user->id,
            'restaurant_id' => 1,
        ]);

        $response->assertRedirect('mypage');

        // ユーザ削除
        User::where('id', $user->id)
        ->delete();
    }
}
