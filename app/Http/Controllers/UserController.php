<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view('user.index',compact('user'));
    }
    public function update(Request $request,$id){
        // dd($request);
        $user = User::find($id);
        if($user){
            $update = $user->update([
                "name" => $request->name,
                "description" => $request->description,
                "company" => $request->company,
                "country" => $request->country,
                "address" => $request->address,
                "phone" => $request->phone
            ]);
            if($update){
                return redirect()->route('user.index');
            }else{
                return redirect()->back();
            }
        }
    }
    public function destroy(Request $request){

    }
}
