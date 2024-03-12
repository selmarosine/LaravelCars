<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    protected $redirectTo = '/show';

    public function __invoke(Request $request)
    {
        $cred = $request->only('name', 'password');

        if (Auth::attempt($cred)) {
            $user = Auth::user();
            $request->session()->put('userID', $user->id);
            return redirect()->intended($this->redirectTo);
        } else {
            // selma lägg till errors
            return redirect()->back()->with('error', "Wrong credentials");
        }
    }
}
