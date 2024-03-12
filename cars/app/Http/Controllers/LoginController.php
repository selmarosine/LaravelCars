<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/show';

    public function __invoke(Request $request)
    {
        $cred = $request->only('name', 'password');

        if (Auth::attempt($cred)) {
            return redirect()->intended($this->redirectTo);
        } else {
            // selma lägg till errors
            return redirect()->back()->with('error', "Wrong credentials");
        }
    }
}
