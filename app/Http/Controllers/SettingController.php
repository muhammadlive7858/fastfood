<?php

namespace App\Http\Controllers;
use Stevebauman\Location\Facades\Location;
use Auth;
use App\Models\Setting;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request){
        $userIP = $request->ip();
        $userIP = '84.54.70.235';
        $location = Location::get($userIP);
        $userID = Auth::user()->id;
        $setting = Setting::where('user_id',$userID)->first();
        // dd($setting);
        return view('setting.index',compact('location','setting'));
    }
    public function update(Request $request,$id){
        $update = Setting::find($id);
        $update = $update->update($request->input());
        return redirect()->route('setting.index');
    }
}
