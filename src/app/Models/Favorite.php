<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // お気に入りの追加
    public static function createFavorited($request)
    {
        Favorite::create([
            'user_id'=>$request['user_id'],
            'restaurant_id'=>$request['restaurant_id']
        ]);
    }

    // お気に入りの削除
    public static function deleteFavorited($request)
    {
        Favorite::where('user_id', "=", $request['user_id'])
        ->where('restaurant_id', "=", $request->input('restaurant_id'))
        ->delete();
    }

    // お気に入り取得
    public static function getFavorited($id)
    {
        return Favorite::where('user_id', $id)->get();
    }

    public function isFavoritedBy($user, $restaurant_id): bool
    {
        return Favorite::where('user_id', $user->id)->where('restaurant_id', $restaurant_id)->first() !== null;
    }

}
