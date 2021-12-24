<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'comment',
        'user_id',
        'restaurant_id'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // レビュー登録
    public static function createReview($review)
    {
        DB::transaction(function() use($review) {
            Review::create($review);
        });
    }

    // レビュー既に実施しているか判定
    public function isReviewBy($user, $restaurant_id): bool
    {
        return Review::where('user_id', $user->id)->where('restaurant_id', $restaurant_id)->first() !== null;
    }
}
