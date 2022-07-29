<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['telephone_number' => $request->telephone_number, 'password' => $request->password])) {
            if(Auth::user()->is_admin) {
                return redirect()->route('dashboard.index');
            }
            return redirect()->route('home')->with('Welcome to the SaveAndSell');
        }

        return redirect()->route('login.form')->with('dismiss', 'Telephone number or Password does not match');
    }

    public function signupForm()
    {
        return view('frontend.auth.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'password'      => 'required|min:6|confirmed',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'telephone_number' => 'required|unique:users',
        ]);

        try {

            $user = User::create([
                'first_name'    => $request->first_name,
                'last_name'    => $request->last_name,
                'telephone_number'    => $request->telephone_number,
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'post_code'     => $request->post_code,
                'city'          => $request->city,
                'country'       => $request->country,
                'password'      => Hash::make($request->password),
            ]);
            
            return redirect()->route('login.form')->with('Signup successfully, Login in now');

        } catch (Exception $e) {
            return redirect()->back()->with('dismiss', $e->getMessage());
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
