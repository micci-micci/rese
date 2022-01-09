<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OwnerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // use RefreshDatabase;

    public function testOwner()
    {
        // ユーザ作成
        $user = User::factory()->create([
            'name'=>'hoge',
            'email'=>'hoge@gmail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 1
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

        $response = $this->get(route('owner'));
        $response->assertStatus(200);

        // レストラン登録
        $response = $this->post(route('owner.create'), [
            'name' => 'test',
            'area_id' => 13,
            'category_id' => 1,
            'description' => '美味しい居酒屋だよ。'
        ]);

        // レストラン登録チェック
        $this->assertDatabaseHas('restaurants', ['name' => 'test']);

        // レストラン更新
        $response = $this->post(route('owner.update'), [
            'id' => 1,
            'name' => 'test02',
            'area_id' => 13,
            'category_id' => 2,
            'description' => '美味しいお店だよ。'
        ]);

        // // レストラン登録チェック
        $this->assertDatabaseHas('restaurants', ['name' => 'test02']);

        // レストラン削除
        $response = $this->post(route('owner.destroy'), [
            'id' => 1,
        ]);

        // レストランの予約確認
        $response = $this->get(route('owner.reservation'), [
            'id' => $user->id
        ]);
        $response->assertStatus(200);

        // ユーザ削除
        User::where('id', $user->id)
        ->delete();
    }
}
