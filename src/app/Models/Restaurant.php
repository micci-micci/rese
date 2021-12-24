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
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    // レストラン検索
    public static function multiSearch($request)
    {
        $area = $request->area;
        $category = $request->category;
        $search = $request->search;

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
}
