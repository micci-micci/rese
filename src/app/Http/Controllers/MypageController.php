<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;

class MypageController extends Controller
{
    public function mypage()
    {
        $dt = Carbon::today();

        $id = Auth::id();
        $auth = Auth::user();
        $reservations = Reservation::getUserid($id);
        $favorites = Favorite::getFavorited($id);

        return view('mypage.index')
            ->with(['reservations' => $reservations])
            ->with(['favorites' => $favorites])
            ->with(['auth' => $auth])
            ->with(['dt' => $dt]);
    }

    // 予約更新
    public function update(Request $request)
    {
        $reserve = $request->only(['date', 'time', 'number', 'restaurant_id']);
        $id = Auth::id();
        $reserve['user_id'] = $id;

        Reservation::updateReserved($reserve);
        return redirect('mypage');
    }

    // 予約削除
    public function destroy(Request $request)
    {
        $id = Auth::id();
        $restaurants = $request->only('restaurant_id');
        $reservations = Reservation::destroyReserved($id, $request);

        return redirect('mypage');
    }

    // 飲食店評価
    public function review(Request $request)
    {
        $review = $request->only(['rate', 'comment', 'restaurant_id']);
        $id = Auth::id();
        $review['user_id'] = $id;

        Review::createReview($review);
        return redirect('mypage');
    }
}
