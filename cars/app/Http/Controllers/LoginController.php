<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $cred = $request->only('name', 'password');

        if (Auth::attempt($cred)) {
            return redirect('/show');
        } else {
            // selma lägg till errors
            return redirect()->back()->with('Error');
        }
    }
}
