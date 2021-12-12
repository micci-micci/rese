<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypage()
    {
        $id = Auth::id();
        $auth = Auth::user();
        $reservations = Reservation::getUserid($id);
        $favorites = Favorite::getFavorited($id);

        return view('mypage.index')
            ->with(['reservations' => $reservations])
            ->with(['favorites' => $favorites])
            ->with(['auth' => $auth]);
    }

    public function destroy(Request $request)
    {
        // dd($request);
        $id = Auth::id();
        $restaurants = $request->only('restaurant_id');
        $reservations = Reservation::destroyReserved($id, $request);

        return redirect('mypage');
    }
}
