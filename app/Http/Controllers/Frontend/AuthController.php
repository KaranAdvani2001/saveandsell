<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('login.form')->with('dismiss', 'Email or Password does not match');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
