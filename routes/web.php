<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurant.detail');
Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotel.detail');

Route::post('/resto-transaksi', [RestaurantController::class, 'transaksi'])->name('resto.transaksi');
Route::post('/hotel-transaksi', [HotelController::class, 'transaksi'])->name('hotel.transaksi');