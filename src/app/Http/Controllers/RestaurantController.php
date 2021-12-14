<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('restaurants.index')
            ->with(['restaurants' => $restaurants]);
    }

    public function search(Request $request)
    {
        $area = $request->area;
        $category = $request->category;
        $search = $request->search;
        // dd($area);

        $restaurants = Restaurant::multiSearch($area, $category, $search);

        return view('restaurants.index')
            ->with(['restaurants' => $restaurants]);
    }

    public function favorite(Request $request)
    {
        $id = Auth::id();
        $favorites_count = $request->favorite_count;

        if ( $request->favorite_count == 0)
        {
            Favorite::createFavorited($request);
        } else {
            Favorite::deleteFavorited($request);
        }

        $param = [
            'favorites_count' => $favorites_count,
        ];

        return response()->json($param);
    }

    public function detail(Request $request)
    {
        $restaurant = Restaurant::oneSearch($request);

        return view('restaurants.detail')
            ->with(['restaurant' => $restaurant]);
    }

    public function reserve(ReservationRequest $request)
    {
        $reserve = $request->only(['date', 'time', 'number', 'restaurant_id']);
        $id = Auth::id();
        $reserve['user_id'] = $id;

        Reservation::createReserved($reserve);
        return redirect('/done');
    }

    public function done()
    {
        return view('restaurants.done');
    }
}
