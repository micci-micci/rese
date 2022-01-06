<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGuest()
    {
        // ゲストユーザでログイン
        $response = $this->get(route('admin'));

        $response->assertStatus(302);
    }

    public function testAdmin()
    {
        // 権限ありのユーザを作成
        $user = User::factory()->create([
            'name'=>'test_admin',
            'email'=>'admin@gmail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'=>2
        ]);

        $response = $this->post('login', [
            'email' => 'mike@gmail.com',
            'password' => 'password'
        ]);

        // 権限ありでアクセスできることを確認
        $response = $this->get(route('admin'));
        $response->assertStatus(200);

        $this->post('logout');
        $response->assertStatus(200);

        // ユーザ削除
        User::where('id', $user->id)
        ->delete();
    }

    public function testOwner()
    {
        // 権限なしのユーザを作成
        $user = User::factory()->create([
            'name'=>'test_owner',
            'email'=>'owner@gmail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'=>1
        ]);

        $response = $this->post('login', [
            'email' => 'owner@gmail.com',
            'password' => 'password'
        ]);

        // 権限不足でアクセスできないことを確認
        $response = $this->get(route('admin'));
        $response->assertStatus(403);

        // 権限付与
        User::where('id', $user->id)
        ->update([
            'role' => 2
        ]);

        $this->post('logout');

        $response = $this->post('login', [
            'email' => 'owner@gmail.com',
            'password' => 'password'
        ]);

        // 権限付与チェック
        $response = $this->get(route('admin'));
        $response->assertStatus(200);

        // ユーザ削除
        User::where('id', $user->id)
        ->delete();
    }
}
