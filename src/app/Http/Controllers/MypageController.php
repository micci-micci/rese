<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class MypageController extends Controller
{
    public function mypage()
    {
        $id = Auth::id();
        $auth = Auth::user();
        $reservations = Reservation::getUserid($id);
        $favorites = Favorite::getFavorited($id);
        // dd($favorites);

        return view('mypage.index')
            ->with(['reservations' => $reservations])
            ->with(['favorites' => $favorites])
            ->with(['auth' => $auth]);
    }

    public function update(Request $request)
    {
        $reserve = $request->only(['date', 'time', 'number', 'restaurant_id']);
        $id = Auth::id();
        $reserve['user_id'] = $id;

        Reservation::updateReserved($reserve);
        return redirect('mypage');
    }

    public function destroy(Request $request)
    {
        $id = Auth::id();
        $restaurants = $request->only('restaurant_id');
        $reservations = Reservation::destroyReserved($id, $request);

        return redirect('mypage');
    }
}
