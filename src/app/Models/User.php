<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'locked_flg',
        'error_count',
    ];

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    // ユーザ登録
    public static function createUser($request)
    {
        DB::transaction(function() use($request) {
            User::create([
                'name'=> $request['name'],
                'email'=> $request['email'],
                'password'=> Hash::make($request['password']),
            ]);
        });
    }

    public static function updateUser($user)
    {
        // dd($user);
        DB::transaction(function() use($user) {
            User::where('id', $user['id'])
                ->update([
                    'role' => $user['role'],
                ]);
        });
    }

    public static function destroyUser($user)
    {
        DB::transaction(function() use($user) {
            User::where('id', $user)
            ->delete();
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
