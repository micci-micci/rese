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

    public function isFavoritedBy($user, $restaurant_id): bool {
        return Favorite::where('user_id', $user->id)->where('restaurant_id', $restaurant_id)->first() !== null;
    }
}
