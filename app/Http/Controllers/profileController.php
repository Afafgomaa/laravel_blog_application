<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Profile;
use App\User;
use Auth;

class profileController extends Controller
{
    public function profile()
   {
    return view('admin.profile.profile')->with('user', Auth::user());
   }

   public function profile_update(Request $request)
   {
            $this->validate($request,[
           'name' => 'required',
           'email' => 'required|email',
           'facebook' => 'required|url',
           'youtuob' => 'required|url'
        ]);

        $user = Auth::User();


        if($request->has('password')){
            $user->password = bcrypt($request->password);
            $user->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtuob = $request->youtuob;
        $user->profile->about = $request->about;

        $user->profile->save();
        $user->save();

         Session::flash('success', 'profile updated');
         return redirect()->back();
   }
}
