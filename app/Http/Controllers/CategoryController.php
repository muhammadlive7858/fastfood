<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $categories = Category::where('user_id',$user_id)->orderBy('id','desc')->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //validate
        $user_id = Auth::user()->id;
        $store = Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'user_id'=>$user_id
        ]);
        if($store){
            return redirect()->route('category.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // dd($category);
        $category = Category::find($id);
        $update = $category->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        if($update){
            return redirect()->route('category.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        $category = Category::find($id);
        $delete = $category::where('user_id',$user_id)->delete();
        if($delete){
            return redirect()->route('category.index');
        }else{
            return redirect()->back();
        }
    }
}
