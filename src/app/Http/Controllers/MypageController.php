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
        $reservations = Reservation::where('user_id', $id)->get();
        $favorites = Favorite::where('user_id', $id)->get();
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
        $reservations = Reservation::where('user_id', $id)
        ->where('restaurant_id', $request->restaurant_id)
        ->delete();

        return redirect('mypage');
    }
}
