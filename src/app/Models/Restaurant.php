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
}
