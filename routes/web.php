<?php

use App\Http\Controllers\BookingController;
use App\Livewire\Booking;
use App\Livewire\Homepage;
use App\Livewire\Organiser;
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

Route::get('/', Homepage::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/', Homepage::class)->name('dashboard');

    Route::get('bookings/create/{event}', Booking::class)->name('bookings.create');

    Route::get('organiser', Organiser::class)->name('organiser');
});
