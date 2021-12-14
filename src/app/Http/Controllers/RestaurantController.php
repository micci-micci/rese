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
        $areas = Area::all();
        $categories = Category::all();

        return view('restaurants.index')
            ->with(['restaurants' => $restaurants])
            ->with(['areas' => $areas])
            ->with(['categories' => $categories]);
    }

    public function search(Request $request)
    {
        $areas = Area::all();
        $categories = Category::all();

        // クエリパラメータの埋め込み
        $area_id = $request->input('area');
        $category_id = $request->input('category');

        $restaurants = Restaurant::multiSearch($request);


        return view('restaurants.index')
            ->with(['restaurants' => $restaurants])
            ->with(['area_id' => $area_id])
            ->with(['category_id' => $category_id])
            ->with(['areas' => $areas])
            ->with(['categories' => $categories]);
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
