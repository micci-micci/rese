<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'user_id',
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
