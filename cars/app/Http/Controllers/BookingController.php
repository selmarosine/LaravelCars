<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class BookingController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function showForm()
    {
        return view('booking');
    }

    public function submitForm(Request $request)
    {
            $validatedData = $request->validate([
                'regNo' => 'required|string',
            ]);

            $regNo = $validatedData['regNo'];

            $existingCar = Car::where('regnr', $regNo)->first();

            if($existingCar) {
                return redirect()->back()->with('error', 'This registration number already exists.')->withInput();
            }else {

            return redirect()->route('booking')->with('regNo', $validatedData['regNo']);
            }
    }
}
