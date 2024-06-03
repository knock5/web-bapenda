<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function show($id)
    {
        $hotel = Hotel::find($id);
        $user = Auth::user();

        return view('user.detail-hotel', compact('hotel', 'user'));
    }

    public function transaksi(Request $request)
    {
        $request->validate(
        [
            'hotel_id' => 'required',    
            'transaction_number' => 'required|string',    
            'payment_method' => 'required|string',    
            'ammount' => 'required',    
        ],
        [
            'hotel_id.required' => 'ID Restaurant tidak boleh kosong',    
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
        $hotel = Hotel::find($request->hotel_id);
        $existingDueDate = Carbon::parse($hotel->tax_due_date);
        $hotel->is_tax_paid = true;
        $hotel->last_tax_payment = Carbon::now();
        $hotel->tax_due_date = $existingDueDate->addMonth();
        $hotel->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil, Terima kasih telah membayar pajak');
    }
}
