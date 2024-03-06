<?php

use App\Http\Controllers\CheckBookingController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('index');
})->name('login')->middleware('guest');

Route::post('login', LoginController::class);
Route::get('show', function () {
    return view('showCar');
});

Route::post('/schedule', [CheckBookingController::class, 'scheduleCar'])->name('schedule.car');
