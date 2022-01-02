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

    // 対象レストランの予約情報取得
    public static function getReservation($id)
    {
        // 所有レストランの抽出
        $sub_query = Restaurant::select('id AS rs_id', 'user_id AS rs_user_id')
            ->where("user_id", $id)
            ->toSql();

        // 所有レストランの予約情報の抽出
        return $reservations = Reservation::JoinSub($sub_query, 'rs', 'reservations.restaurant_id', 'rs.rs_id')
            ->setBindings(["user_id"=>$id])
            ->where('date', '>=', DB::raw('curdate()'))
            ->get();
    }

    // 予約登録
    public static function createReserved($reserve)
    {
        DB::transaction(function() use($reserve) {
            Reservation::create($reserve);
        });
    }

    // 予約更新
    public static function updateReserved($reserve)
    {
        DB::transaction(function() use($reserve) {
            Reservation::where('user_id', $reserve['user_id'])
                ->where("restaurant_id", $reserve['restaurant_id'])
                ->update([
                    'date'=> $reserve['date'],
                    'time'=> $reserve['time'],
                    'number'=> ($reserve['number']),
                ]);
        });
    }

    // 予約削除
    public static function destroyReserved($id, $request)
    {
        DB::transaction(function() use($id, $request) {
            Reservation::where('user_id', $id)
            ->where('restaurant_id', $request->restaurant_id)
            ->delete();
        });
    }
}
