<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Adds a car to the database. Need to solve name/ ID.
    //Where/ how do we set price? 'userID' should probably be set to the current logged in users ID.
    public function scheduleCar(Request $request)
    {
        $validation = $request->validate([
            //'userID' => 'required|integer',
            'regNo' => 'required|string|max:20',
            'date' => 'required|date'
        ]);

        $car = new Car();
        $car->regnr = $validation['regNo'];
        $car->datum = $validation['date'];
        //$car->userID = $validation['userID'];
        //$car->pris = 500;
        $car->save();

        return redirect('/show')->with('success', 'Car scheduled for destruction');
    }

    //delete a car from database based on registration number to cancel "destruction"
    public function deleteCar(string $regNo)
    {
        $car = Car::where('regnr', $regNo)->first();

        if (!$car) {
            return redirect()->back()->with('error', 'Car not found.');
        }

        $car->delete();

        return redirect()->back()->with('success', 'Destruction cancelled for ' . $regNo . ', have a nice day.');
    }

    //used to update the "date" value of a car already in the database
    public function updateDate(Request $request, string $regNo)
    {
        $validateDate = $request->validate([
            'date' => 'required|date'
        ]);

        $car = Car::where('regnr', $regNo)->first();

        if (!$car) {
            return redirect()->back()->with('error', 'Car not booked for destruction');
        }

        $car->datum = $validateDate['date'];
        $car->save();

        return redirect()->back()->with('success', 'Date updated for ' . $regNo . ".");
    }
}
