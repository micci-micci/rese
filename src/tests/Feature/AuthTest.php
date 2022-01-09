<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Artisan;

class AuthTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
    }

    // ゲストユーザ認証チェック
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

        // レストラン一覧画面
        $response = $this->get(route('login'));
        $response->assertStatus(200);

        // レストラン一覧画面
        $response = $this->get(route('register'));
        $response->assertStatus(200);

    }

    // 登録ユーザ認証チェック
    public function testLogin()
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

        // マイページ画面
        $response = $this->get(route('mypage'));
        $response->assertStatus(200);

        // ログアウト
        $this->post('logout');
        $response->assertStatus(200);

    }

    // ログイン失敗
    public function testAuthError()
    {
        // ユーザ作成
        $user = User::factory()->create([
            'name'=>'hoge',
            'email'=>'hoge@gmail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 0
        ]);

        // 認証エラー
        $response = $this
        ->from('login')
        ->post('login', [
            'email' => 'hog@gmail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('login');
        // 失敗チェック
        $this->assertGuest();
    }

    // ユーザ登録
    public function testRegister()
    {
        $this->assertFalse(Auth::check());

        // ユーザ登録
        $response = $this->post('thanks', [
            'name' => 'fuga',
            'email' => 'fuga@gmail.com',
            'password' => 'password'
        ]);

        // ユーザ登録チェック
        $this->assertDatabaseHas('users', ['name' => 'fuga']);

        //  ログイン
        $response = $this->post('login', [
            'email' => 'fuga@gmail.com',
            'password' => 'password'
        ]);

        // 認証チェック
        $this->assertTrue(Auth::check());
        $response->assertRedirect('/');
    }
}
