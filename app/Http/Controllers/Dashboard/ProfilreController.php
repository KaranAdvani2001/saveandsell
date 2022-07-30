<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilreController extends Controller
{
    public function profile()
    {
        return view('dashboard.profile.profile',['menu' => 'profile', 'submenu' => 'profile', 'user' => Auth::user()]);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'telephone_number' => 'required|unique:users,telephone_number,'. $request->edit_id,
        ]);

        try {
            $profileData = [
                'first_name'    => $request->first_name,
                'last_name'    => $request->last_name,
                'telephone_number'    => $request->telephone_number,
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'post_code'     => $request->post_code,
                'city'          => $request->city,
                'country'       => $request->country,
            ];

            if(!empty($request->image)) {
                $profileData['image'] = app(ProductController::class)->fileUpload($request->image, 'uploaded_files/profile/images/');
            }

            User::where('id', Auth::id())->update($profileData);
            return redirect()->back()->with("success", "Profile successfully updated");

        } catch (Exception $e) {
            return redirect()->back()->with('dismiss',$e->getMessage());
        }
        
    }
}
