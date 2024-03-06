<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Car;

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

    //Adds a car to the database. Need to solve name/ ID.
    public function scheduleCar(Request $request)
    {
        $validation = $request->validate([
            'userID' => 'required|integer',
            'regNo' => 'required|string|max:20',
            'date' => 'required|date'
        ]);

        $car = new Car();
        $car->regnr = $validation['regNo'];
        $car->datum = $validation['date'];
        $car->userID = $validation['userID'];
        $car->pris = 500;
        $car->save();

        return redirect('/show')->with('success', 'Car scheduled for destruciton');
    }

    /* public function userCars(): View
    {
        //$cars = DB::table('cars')->get()->where();

        return view('/', ['cars' => $cars]);
    } */
}
