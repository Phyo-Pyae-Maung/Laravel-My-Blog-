<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Post};

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *       
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 // $categories = Category::paginate(5);
        $categories = Category::paginate(8);
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect('admin/categories')->with('msg','A Category is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       $category = Category::find($id);
       return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::find($id)->update([
            'name' => $request->name
        ]);

        return redirect('admin/categories')->with('msg','A Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        Post::where('category_id', '=', $category->id)->delete();
        $category->delete();
        return back()->with('msg','A Category is Deleted');
    }



}
