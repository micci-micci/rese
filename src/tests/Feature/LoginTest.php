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

    // ゲストユーザ
    public function testGuest()
    {
        // レストラン一覧画面
        $response = $this->get(route('restaurants.index'));
        $response->assertStatus(200);

        // 管理画面
        $response = $this->get(route('admin'));
        $response->assertStatus(302);

        // オーナー画面
        $response = $this->get(route('owner'));
        $response->assertStatus(302);

        // マイページ画面
        $response = $this->get(route('mypage'));
        $response->assertStatus(302);

        // レストラン詳細画面
        $response = $this->get(route('restaurants.datail', ['id' => 1]));
        $response->assertStatus(200);

        // レストラン一覧画面
        $response = $this->get(route('login'));
        $response->assertStatus(200);

        // レストラン一覧画面
        $response = $this->get(route('register'));
        $response->assertStatus(200);

    }

    // 登録ユーザ
    public function testLogin()
    {
        // ユーザ作成
        $user = User::factory()->create([
            'name'=>'hoge',
            'email'=>'hoge@gmail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'=>0
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

        // マイページ画面
        $response = $this->get(route('mypage'));
        $response->assertStatus(200);

        // ログアウト
        $this->post('logout');
        $response->assertStatus(200);

        // ユーザ削除
        User::where('id', $user->id)
        ->delete();
    }
}
