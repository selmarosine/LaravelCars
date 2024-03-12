<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function logout(Request $request)
    {
        $request->session()->forget('userID');
        Auth::logout();
        return redirect()->route('login');
    }
}
