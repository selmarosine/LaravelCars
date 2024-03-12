<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\User;

class NewUserController extends Controller
{
    public function NewUser(Request $request)
    {
        $validation = $request->validate([
            'regNumber' => 'required|string|max:8',
            'date' => 'required|date',
            'createUser' => 'required|string|max:25',
            'createPassword' => 'required|min:3'
        ]);

        //$userId = Auth::id();
        $newUser = new User();
        $newUser->name = $validation['createUser'];
        $newUser->password = bcrypt($validation['createPassword']);
        $newUser->save();

        $userId = $newUser->id;

        $newCar = new Car();
        //$newCar->userID = $userId;
        $newCar->regnr = $validation['regNumber'];
        $newCar->datum = $validation['date'];
        $newCar->userID = $userId;
        $newCar->save();

        return redirect('/book')->with('success', 'Booking has been made and your account has been created!');
    }
}
