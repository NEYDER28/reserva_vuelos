<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/flight/search',[FlightController::class,'search'])->middleware(['auth', 'verified'])->name('search');
Route::get('/flights',[FlightController::class,'start'])->middleware(['auth', 'verified'])->name('flights');
Route::get('/booking',[BookingController::class,'start'])->middleware(['auth', 'verified'])->name('booking');
Route::post('/book',[BookingController::class,'create'])->name('book');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
