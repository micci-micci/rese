<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'area_id',
        'category_id',
        'user_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // レストラン検索
    public static function multiSearch($area, $category, $search)
    {
        $query = Restaurant::query();

        if ($area != ''){
        $query = $query->areaEqual($area);
        }
        if ($category != ''){
        $query = $query->categoryEqual($category);
        }
        if ($search != ''){
        $query = $query->stringLike($search);
        }
        return $query->get();
    }

    // エリア検索
    public function scopeAreaEqual($query, $area)
    {
        return $query->where('area_id', $area);
    }
    // カテゴリ検索
    public function scopeCategoryEqual($query, $category)
    {
        return $query->where('category_id', $category);
    }
    // 文字列検索
    public function scopeStringLike($query, $search)
    {
        return $query->Where('name','like', '%'.$search.'%');
    }

    // レストラン一件抽出
    public static function oneSearch($request)
    {
        return Restaurant::where('id', $request->id)->first();
    }

    // レストラン登録
    public static function CreateRestaurant($restaurant)
    {
        DB::transaction(function() use($restaurant) {
            Restaurant::create($restaurant);
        });
    }

    // 自分のレストランを取得
    public static function getMyRestaurant($id)
    {
        return Restaurant::where('user_id', $id)->get();
    }

    // レストラン削除
    public static function destroyRestaurant($restaurant_id)
    {
        DB::transaction(function() use($restaurant_id) {
            Restaurant::where('id', $restaurant_id)
            ->delete();
        });
    }
}
