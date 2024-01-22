<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Category;

use Illuminate\Http\Request;
use Auth;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        
        $foods = Foods::where('user_id',$user_id)->orderBy('id','desc')->get();
        return view('foods.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $categories = Category::where('user_id',$user_id)->get();
        return view('foods.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $user_id = Auth::user()->id;

        $uploaded = $request->file('image');

        $tmp_name = $request->file('image')->getClientOriginalExtension();

        $image = $this->generateFile($uploaded, $tmp_name);
        // dd($image);

        $store = Foods::create([
            'name'=>$request->name,
            'image'=>$image,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>$user_id
        ]);
        if($store){
            return redirect()->route('food.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Foods $foods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $food = Foods::find($id);
        $user_id = Auth::user()->id;
        $categories = Category::where('user_id',$user_id)->get();
        // dd($food);
        return view('foods.edit',compact('food','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $food = Foods::find($id);

        $user_id = Auth::user()->id;

        $uploaded = $request->file('image');

        if($uploaded){
            $tmp_name = $request->file('image')->getClientOriginalExtension();

            $image = $this->generateFile($uploaded, $tmp_name);
            $update = $food->update([
                'name'=>$request->name,
                'image'=>$image,
                'description'=>$request->description,
                'price'=>$request->price,
                'user_id'=>$user_id
            ]);
            if($update){
                return redirect()->route('food.index');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
        // dd($image);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $food = Foods::find($id);
        if($food){
            $food->delete();
            return redirect()->route('food.index');
        }else{
            return redirect()->back();
        }
    }
    protected function generateFile($uploaded, $tmp_name)
    {
        $new_name = rand(100, 999) . time() . 'image.' . $tmp_name;
        //dd($new_name);
        $move = $uploaded->move(public_path('images/uploaded-image/'), $new_name);
        //dd($move);
        if ($move) {
            return $baza_name = "images/uploaded-image/" . $new_name;
        }
    }
}
