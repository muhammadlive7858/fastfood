<?php

namespace App\Http\Controllers;

use App\Models\Tables;
use Illuminate\Http\Request;
use Auth;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $tables = Tables::where('user_id',$user_id)->orderBy('id','desc')->get();
        return view('tables.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //validate
        $user_id = Auth::user()->id;
        $store = Tables::create([
            'table_number'=>$request->table_number,
            'user_id'=>$user_id
        ]);
        if($store){
            return redirect()->route('table.index');
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
        $table = Tables::find($id);
        return view('tables.edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // dd($category);
        $tables = Tables::find($id);
        $update = $tables->update([
            'table_number'=>$request->table_number
        ]);
        if($update){
            return redirect()->route('table.index');
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
        $table = Tables::find($id);
        $delete = $table->where('user_id',$user_id)->delete();
        if($delete){
            return redirect()->route('table.index');
        }else{
            return redirect()->back();
        }
    }
}
