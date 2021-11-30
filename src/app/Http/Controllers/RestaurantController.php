<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Category;
use App\Models\Favorite;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $favorites = Favorite::all();

        return view('restaurants.index')
            ->with(['restaurants' => $restaurants])
            ->with(['favorites' => $favorites]);
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
}
