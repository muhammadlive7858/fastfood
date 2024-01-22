<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BotUser;
use App\Models\Setting;

class bot_controller extends Controller
{
    //
    public function check($chatid){
        $bot_user = BotUser::where('chatid',$chatid)->get();
        if($bot_user){
            return true;
        }else{
            return false;
        }
    }
    public function create_bot_user(Request $request){
        // validate
        $store = BotUser::create([
            'name'=>$request['name'],
            'chatid' => $request['chatid'];
        ]);
        if($store){
            return responce()->json('User create success',$store);
        }else{
            return responce()->json('User not created');
        }
    }
    public function get_location(){
        $location = Setting::first();
        $location = $location->location;
        if($location){
            return responce()->json('Location',$location);
        }else{
            return responce()->json('Location not found');
        }
    }
    public function get_food(){
        $foods = Food::all();
        return responce()->json('get Foods',$foods);
    }
    public function create_order(Request $request){
        $table = $request->table;
        $session_table = $request->session()->get($table);
        if($session_table !== null){
            return responce()->json('This table is bron');
        }
        // dd($session_table);
        $data = [];
        $i = 0;
        foreach($request->food as $food){
            foreach($request->count as $count){
                if($request->count[$i] == 0){
                    // dd($count);
                }else{
                    $data[$request->food[$i]] = $request->count[$i];
                }
            }
            $i++;
        }
        $new_data = [];
        array_push($new_data,$data);
        $request->session()->put($table,$new_data);
        // dd($request->session()->get($table));
        return redirect()->json('Order created success');
    }
}
