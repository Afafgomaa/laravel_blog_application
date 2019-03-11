<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;
class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }



    public function edit()
    {
        return view('admin.settings.index')->with('setting', Setting::get()->first());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $Setting = Setting::first();
       $Setting->address        = $request->address;
       $Setting->site_name      = $request->site_name;
       $Setting->contact_number = $request->contact_number;

       $Setting->save();
       Session::flash('success', 'Setting Updated Successuflly.');
       return redirect()->back();
   }
}
