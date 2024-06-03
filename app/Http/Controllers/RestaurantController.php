<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        $user = Auth::user();

        return view('user.detail-restaurant', compact('restaurant', 'user'));
    }

    public function transaksi(Request $request)
    {
        $request->validate(
        [
            'restaurant_id' => 'required',    
            'transaction_number' => 'required|string',    
            'payment_method' => 'required|string',    
            'ammount' => 'required',    
        ],
        [
            'restaurant_id.required' => 'ID Restaurant tidak boleh kosong',    
            'transaction_number.required' => 'ID Transaksi tidak boleh kosong',    
            'payment_method.required' => 'Pilih metode pembayaran',    
            'ammount.required' => 'Total harga tidak boleh kosong',    
        ]);

        // add data pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->restaurant_id = $request->restaurant_id;
        $pembayaran->hotel_id = $request->hotel_id;
        $pembayaran->transaction_number = $request->transaction_number;
        $pembayaran->ammount = $request->ammount;
        $pembayaran->payment_method = $request->payment_method;
        $pembayaran->status = 'Berhasil';
        $pembayaran->save();

        // Mengupdate data restaurant
        $restaurant = Restaurant::find($request->restaurant_id);
        $restaurant->is_tax_paid = true;
        $restaurant->last_tax_payment = Carbon::now();
        $restaurant->tax_due_date = Carbon::now()->addMonth();
        $restaurant->save();

        return response()->json(['success' => true, 'pembayaran' => $pembayaran]);
    }
}
