<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function show($id)
    {
        $hotel = Hotel::find($id);
        $user = Auth::user();

        return view('user.detail-hotel', compact('hotel', 'user'));
    }
}
