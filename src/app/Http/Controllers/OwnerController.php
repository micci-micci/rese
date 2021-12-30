<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Reservation;

class OwnerController extends Controller
{
    public function show()
    {
        $id = Auth::id();
        $reservations = Reservation::all();

        $restaurants = Restaurant::getMyRestaurant($id);
        // $reservations = Reservation::getRestaurantid($id);

        return view('management.owner')
            ->with(['restaurants' => $restaurants])
            ->with(['reservations' => $reservations]);
    }

    public function create(Request $request)
    {
        $restaurant = $request->only(['id', 'name', 'area_id', 'category_id', 'image_url', 'description']);
        $id = Auth::id();
        $restaurant['user_id'] = $id;

        Restaurant::createRestaurant($restaurant);
        return view('management.owner');
    }

    public function update(Request $request)
    {
        $restaurant = $request->only(['id', 'name', 'area_id', 'category_id', 'image_url', 'description']);
        dd($restaurant);

        Restaurant::updateRestaurant($restaurant);
        return view('management.owner');
    }

    public function destroy(Request $request)
    {
        $restaurant_id = $request->only(['id']);

        Restaurant::destroyRestaurant($restaurant_id);

        return redirect('owner');
    }
}
