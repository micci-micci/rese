<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'area_id',
        'category_id',
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
}
