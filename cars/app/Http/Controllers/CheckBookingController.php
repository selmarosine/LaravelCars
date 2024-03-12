<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class CheckBookingController extends Controller
{
    /**
     * Show a list of all of the application's users.
     */
    /*public function index(): View
    {
        $cars = DB::table('cars')->get();

        return view('/', ['cars' => $cars]);
    }*/
    public function index(): View {
        $userId = Auth::id();

        //$cars = DB::table('cars')->where('user_id', $userId)->get();

        $cars = Car::where('userID', $userId)->get();

        return view('bookings.index', ['cars' => $cars]);
    }
}
