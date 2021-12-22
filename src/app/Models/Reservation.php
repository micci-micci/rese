<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'number',
        'user_id',
        'restaurant_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // 予約情報取得
    public static function getUserid($id)
    {
        return Reservation::where('user_id', $id)->get();
    }

    // 予約登録
    public static function createReserved($reserve)
    {
        DB::transaction(function() use($reserve) {
            Reservation::create($reserve);
        });
    }

    // 予約削除
    public static function destroyReserved($id, $request)
    {
        // DB::beginTransaction();
        // try {
        //     Reservation::where('user_id', $id)
        //     ->where('restaurant_id', $request->restaurant_id)
        //     ->delete();
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollBack();
        // }
        DB::transaction(function() use($id, $request) {
            Reservation::where('user_id', $id)
            ->where('restaurant_id', $request->restaurant_id)
            ->delete();
        });
    }
}
