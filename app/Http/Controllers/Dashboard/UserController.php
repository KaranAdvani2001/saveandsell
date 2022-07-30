<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::simplePaginate(5);
        return view('dashboard.user.index',['menu' => 'user', 'users' => $users]);
    }

    public function makeAdmin($id)
    {
        try {
            $user = user::where(['id' => decrypt($id)])->first();
            if(!empty($user)) {
                $user->update([
                    'is_admin'  =>1
                ]);
                return redirect()->route('user.list')->with('success', 'User successfully made an admin');

            } 
            return redirect()->route('user.list')->with('dismiss', 'User does not found');

        } catch(Exception $e) {
            return redirect()->route('user.list')->with('dismiss', 'User does not found');
        }
    }

    public function removedAdmin($id)
    {
        try {
            $user = user::where(['id' => decrypt($id)])->first();
            if(!empty($user)) {
                $user->update([
                    'is_admin'  =>0
                ]);
                return redirect()->route('user.list')->with('success', 'User successfully removed from admin');

            } 
            return redirect()->route('user.list')->with('dismiss', 'User does not found');

        } catch(Exception $e) {
            return redirect()->route('user.list')->with('dismiss', 'User does not found');
        }
    }
}
