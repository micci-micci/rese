<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

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
        $search = $request->search;
        if ($search == '')
        {
            $restaurants = Restaurant::where('area_id', $request->area)
            ->orWhere('category_id', $request->category)
            ->get();
        } else {
            $restaurants = Restaurant::Where('name','like', '%'.$request->search.'%')
            ->get();
        }

        return view('restaurants.index')
            ->with(['restaurants' => $restaurants]);
    }

    public function favorite(Request $request)
    {
        $favorites_count = $request->favorite_count;

        if ( $request->favorite_count == 0)
        {

            $favorite = new Favorite();
            $favorite->user_id = $request->user_id;
            $favorite->restaurant_id = $request->restaurant_id;
            $favorite->save();
        } else {
            Favorite::where('user_id', "=", auth()->user()->id)
            ->where('restaurant_id', "=", $request->input('restaurant_id'))
            ->delete();
        }

        $param = [
            'favorites_count' => $favorites_count,
        ];

        return response()->json($param);
    }

    public function detail(Request $request)
    {
        $restaurant = Restaurant::where('id', $request->id)->first();
        return view('restaurants.detail')
            ->with(['restaurant' => $restaurant]);
    }

    public function reserve(Request $request)
    {
        // dd($request);
        $reserve = $request->only(['date', 'time', 'number', 'restaurant_id']);
        $id = Auth::id();
        $reserve['user_id'] = $id;

        // dd($reserve);
        Reservation::create($reserve);
        return redirect('/done');
    }

    public function done()
    {
        return view('restaurants.done');
    }
}
