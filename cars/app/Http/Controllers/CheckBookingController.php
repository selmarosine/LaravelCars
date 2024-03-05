<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CheckBookingController extends Controller
{
    /**
     * Show a list of all of the application's users.
     */
    public function index(): View
    {
        $cars = DB::table('cars')->get();

        return view('/', ['cars' => $cars]);
    }

    /* public function userCars(): View
    {
        //$cars = DB::table('cars')->get()->where();

        return view('/', ['cars' => $cars]);
    } */
}
