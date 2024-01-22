<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tables;
use App\Models\Foods;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


class ServiceController extends Controller
{
    public function user_id(){
        return Auth::user()->id;
    }
    public function index(){
        
        $tables = Tables::where('user_id',$this->user_id())->get();
        return view('service.index',compact('tables'));
    }
    public function create($id){
        $foods = Foods::where('user_id',$this->user_id())->get();
        return view('service.order',compact('foods','id'));
    }
    public function store(Request $request){
        $table = $request->table_number;
        $session_table = $request->session()->get($table);
        if($session_table !== null){
            $request->session()->forget($table);
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
        return redirect()->route('service.show.order',$table);
    }
    public function plus(Request $request,$table){
        $foods = Foods::where('user_id',$this->user_id())->get()->toArray();
        $session = $request->session()->get($table);
        //   dd($foods);  
        $new_food = [];
        $new_session = [];
        foreach($session as $session){
            foreach($session as $food => $count){
                array_push($new_session,$food);
            }
        }

        foreach($foods as $food){
            if(!in_array($food['id'],$new_session)){
                // dd($new_session);
                // unset($foods,$food);
                array_push($new_food,$food);
            }else{
            }
        }
        // dd($new_food);
        return view('service.plus',compact('new_food','table'));
    }
    public function session_plus(Request $request){
        $session = $request->session()->get($request->table);
        // dd($request->food);
        $data = [];
        $i = 0;
        foreach($request->food as $food){
            foreach($request->count as $count){
                if($request->count[$i] == 0){
                    // dd($count);
                }else{
                    $data[$i] = [$request->food[$i] => $request->count[$i]];
                }
            }
            $i++;
        }
        foreach($session as $session){
            foreach($session as $food => $count){
                array_push($data,[$food => $count]);
            }
        }

        // dd($data);
        $request->session()->put($request->table,$data);
        return redirect()->route('service.show.order',$request->table);
    }
    public function show(Request $request,$table){
        // $request->session()->forget($table);
        // dd($table);
        $session = $request->session();
        $data = $session->get($table);
        // dd($data);
        $newdata = [];
        if($data == null){
            return redirect()->back();
        }
        foreach($data as $data){
            foreach($data as $food => $count){
                $new_food = Foods::find($food);
                // dd($new_food);
                if($new_food->user_id === Auth::user()->id){
                    $array = ['id'=>$new_food->id,'name'=>$new_food->name,'image'=>$new_food->image,'price'=>$new_food->price,'count'=>$count];
                    array_push($newdata,$array);
                }
            }
        }
        // dd($newdata);
        return view('service.showorder',compact('newdata','table'));
    }
    public function edit(Request $request){
        // dd($request->id);
        $food = Foods::find($request->id);
        $count = $request->count;
        $table = $request->table;
        return view('service.editorder',compact('food','count','table'));
    }
    public function update(Request $request){
        $table = $request->table;
        $food_id = intval($request->food);
        $session = $request->session()->get($request->table);
        $array = [];
        foreach($session as $session){
            foreach($session as $food => $count){
                // dd($food_id);
                if(intval($food_id) == $food){
                    array_push($array,[$food => $request->count]);
                }else{
                    array_push($array,[$food => $count]);
                }
            }
        }
        // dd($array);
        $request->session()->put($request->table,$array);
        return redirect()->route('service.show.order',$table);
    }
    public function delete_one(Request $request){
        $table = $request->table;
        $food_id = intval($request->id);
        $session = $request->session()->get($request->table);
        $array = [];
        // dd($request->id);
        foreach($session as $session){
            foreach($session as $food => $count){
                if($food_id != $food){
                    array_push($array,[$food => $count]);
                    //    dd($food); 
                }
            }
        }
        // dd($array);
        $request->session()->put($request->table,$array);
        return redirect()->route('service.show.order',$table); 
    }
    public function destroy(Request $request,$table){
        $session_table = $request->session()->get($table);
        // dd($session_table);
        if($session_table !== null){
            $request->session()->forget($table);
        }
        return redirect()->route('service.index');
    }
}
