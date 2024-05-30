<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        $user = Auth::user();

        return view('user.detail-restaurant', compact('restaurant', 'user'));
    }
}
