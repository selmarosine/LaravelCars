<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckBookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
//use App\Http\Controllers\FormController;
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
});//->name('login')->middleware('guest');

Route::post('login', LoginController::class);
Route::get('show', function () {
    return view('showCar');
});
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/book', [BookingController::class, 'showForm'])->name('booking');

Route::post('/book', [BookingController::class, 'submitForm'])->name('submit.form');

//Route for scheduling of car destruction, calls the scheduleCar method
Route::post('/schedule', [CarController::class, 'scheduleCar'])->name('schedule.car');
//Route for cancelling car destruction,
//calls the deleteCar method which deletes a car from the database based on reg number provided.
Route::delete('/cars/{regnr}', [CarController::class, 'deleteCar'])->name('delete.car');
//Route for updating the "date" value on a car in the database. If user wants to change their specified destruction date
Route::put('/cars/{regnr}', [CarController::class, 'updateDate'])->name('update.date');

