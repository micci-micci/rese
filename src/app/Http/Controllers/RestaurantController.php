<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Category;


class RestaurantController extends Controller
{
    public function index()
    {
        // $restaurants = Restaurant::all();
        $restaurants = Restaurant::with('area')->get();
        // $restaurants = Restaurant::with(['area', 'category_id'])->get();

        // dd($restaurants);
        return view('restaurants.index')
            ->with(['restaurants' => $restaurants]);
    }
}
