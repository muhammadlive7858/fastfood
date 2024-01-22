<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use Illuminate\Http\Request;
use Auth;

class ChefsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        
        $chefs = Chefs::where('user_id',$user_id)->orderBy('id','desc')->get();
        return view('chefs.index',compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chefs.create');
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

        $store = Chefs::create([
            'name'=>$request->name,
            'image'=>$image,
            'description'=>$request->description,
            'user_id'=>$user_id
        ]);
        if($store){
            return redirect()->route('chef.index');
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
        $chef = Chefs::find($id);
        // dd($food);
        return view('chefs.edit',compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $chef = Chefs::find($id);

        $user_id = Auth::user()->id;

        $uploaded = $request->file('image');

        if($uploaded){
            $tmp_name = $request->file('image')->getClientOriginalExtension();

            $image = $this->generateFile($uploaded, $tmp_name);
            $update = $chef->update([
                'name'=>$request->name,
                'image'=>$image,
                'description'=>$request->description,
                'user_id'=>$user_id
            ]);
            if($update){
                return redirect()->route('chef.index');
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
        $chef = Chefs::find($id);
        if($chef){
            $chef->delete();
            return redirect()->route('chef.index');
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
