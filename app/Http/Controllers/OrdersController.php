<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Foods;

use App\Models\OrderFood;
use Auth;


class OrdersController extends Controller
{
    protected function user_id(){
        return Auth::user()->id;
    }
    //
    public function index(){
        
    }

    public function store(Request $request,$table){
        $session = $request->session()->get($table);
        // 
        $summa = 0;
        foreach($session as $s){
            foreach($s as $food => $count){
                $food = Foods::find($food);
                $summa = $summa + ($food->price * $count);
            }
        }
        // 
        $date = date('Y-m-d');
        $date = explode('-',$date);
        // dd($date);
        $store = Orders::create([
            'table_id'=>$table,
            'summa' => $summa,
            'year' =>$date[0],
            'month' => $date[1],
            'day' => $date[2],
            'user_id' => Auth::user()->id
        ]);
        $id = $store->id;
        // dd($session);
        foreach($session as $session){
            foreach($session as $food => $count){
                $food = Foods::find($food);
                $array = [
                    'food_name' => $food->name,
                    'food_price' => $food->price,
                    'food_count' => $count,
                    'order_id' => $id
                ];
                $store = OrderFood::create($array);
            }
        }
        
        
        // dd($summa);
        return redirect()->route('service.index');
    }
}
