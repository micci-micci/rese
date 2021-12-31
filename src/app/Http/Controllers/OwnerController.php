<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Reservation;
use Storage;

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
        $restaurant = $request->only(['id', 'name', 'area_id', 'category_id', 'description']);
        $id = Auth::id();
        $restaurant['user_id'] = $id;

        // S3 アップロード
        $image = $request->file('image_url');
        $path = Storage::disk('s3')->put('image', $image);

        // S3 URL 取得
        $image_url = Storage::disk('s3')->url($path);
        $restaurant['image_url'] = $image_url;

        Restaurant::createRestaurant($restaurant);
        return redirect('owner');
    }

    public function update(Request $request)
    {
        $restaurant = $request->only(['id', 'name', 'area_id', 'category_id', 'description', 'image_url']);
        // dd($request);

        // S3 アップロード
        $image = $request->file('image_url');
        $path = Storage::disk('s3')->put('image', $image);

        // S3 URL 取得
        $image_url = Storage::disk('s3')->url($path);
        $restaurant['image_url'] = $image_url;

        Restaurant::updateRestaurant($restaurant);
        return redirect('owner');
    }

    public function destroy(Request $request)
    {
        $restaurant_id = $request->only(['id']);

        Restaurant::destroyRestaurant($restaurant_id);

        return redirect('owner');
    }
}
