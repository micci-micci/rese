<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Artisan;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
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

        // ログイン
        $response = $this->post('login', [
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ]);

        // 権限ありでアクセスできることを確認
        $response = $this->get(route('admin'));
        $response->assertStatus(200);

        // ログアウト
        $this->post('logout');
        $response->assertStatus(200);
    }

    public function testOwner()
    {
        $user = User::factory()->create([
            'name' => 'test_owner',
            'email' => 'owner@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 1
        ]);

        $admin_user = User::factory()->create([
            'name'=>'test_admin',
            'email'=>'admin@gmail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'=>2
        ]);

        $response = $this->post('login', [
            'email' => 'owner@gmail.com',
            'password' => 'password'
        ]);

        $response = $this->get(route('admin'));
        $response->assertStatus(403);

        $this->post('logout');

        $response = $this->post('login', [
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ]);

        // 権限付与
        $response = $this->post(route('admin.update'), [
            'id' => $user->id,
            'role' => '2'
        ]);
        $this->post('logout');

        $response = $this->post('login', [
            'email' => 'owner@gmail.com',
            'password' => 'password'
        ]);

        $response = $this->get(route('admin'));
        $response->assertStatus(200);
    }
}
