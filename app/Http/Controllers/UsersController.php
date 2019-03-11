<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Profile;
use App\User;
use Auth;
class UsersController extends Controller
{
    public function __construct()
    {
    	$this->middleware('admin');
    }

    public function index()
    {
       return view('admin.users.index')->with('users', User::whereNotIn('id',[Auth::id()])->get());
    }

    public function create()
    {
    	return view('admin.users.create');
    }


    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|email'
    	]);

    	$user = User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt('agc555553')
    	]);

      $user->save();

      $profile = Profile::create([
            'user_id' => $user->id,
            'facebook' => 'enter facebook',
            'youtuob' => 'enter your youtube',
            'about'  => 'write some thing about your self'
      ]);
     $profile->save();
    	
       
    	Session::flash('success','User Created Successfuly.');
    	return redirect()->route('users');
    }


    public function destroy($id)
    {
		$user = User::find($id);
    $user->profile->delete();
		$user->delete();
		Session::flash('success', 'User Deleted Successfuly.');
        return redirect()->route('users');
   }

   public function auth_admin($id)
   {
       $user = User::find($id);
       $user->admin = 1;
       $user->save();
       Session::flash('success', 'Admin created success');
       return redirect()->back();
   }

   public function auth_non_admin($id)
   {
       $user = User::find($id);
       $user->admin = 0;
       $user->save();
       Session::flash('success', 'Admin created success');
       return redirect()->back();
   }

   
}
