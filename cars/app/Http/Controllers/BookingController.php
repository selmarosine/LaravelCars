<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return redirect()->route('booking')->with('regNo', $validatedData['regNo']);
    }
}
