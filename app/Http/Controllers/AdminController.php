<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Adminlogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function Userprofile()
    {
        $adminData = User::find(Auth::user()->id);
        return view('backend.admin.admin_profile', compact('adminData'));

    }

    public function Userprofilestore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;


        if ($request->file('profile_photo_path')) {

            $file = $request->file('profile_photo_path');

            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));

            // $file=avatar-1.png

            $filename = date('YmdHi') . $file->getClientOriginalName();

            //$filename=26.3.2022.avatar-1

            $file->move(public_path('upload/admin_images/'), $filename);

            $data['profile_photo_path'] = $filename;


        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.profile')->with($notification);


    }

    public function Changepassword()
    {
        $adminData = User::find(Auth::user()->id);
        return view('backend.admin.change_password', compact('adminData'));
    }

    public function Updatepassword(Request $request)
    {

         $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

       // $hashedPassword = User::find(Auth::user()->id)->password;

        $hashedPassword = Hash::check($request->oldpassword,auth()->user()->password);

        if ($hashedPassword) {

             User::findOrFail(Auth::user()->id)->update([
                 'password'=>Hash::make($request->password),
             ]);



//            $user->password = Hash::make($request->password);
//            $user->save();
//            Auth::logout();

            $notification = array(
                'message' => 'your password has Updated Successfully',
                'alert-type' => 'success'
            );


            return redirect()->route('user.logout')->with($notification);



        }
        else{

            $notification = array(
                'message' => 'current password is not correct',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);


        }
    }
}
