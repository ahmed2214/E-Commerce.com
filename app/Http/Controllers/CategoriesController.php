<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::paginate(10);
        return view('categories.index',['categories'=> $categories] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create
        return view('categories.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $categories = Category::create([
            'Category_name'=> $request->input('name'),

        ]);
         return  redirect()->back();
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
    public function edit(Category $Category)
    {
        //
         
        return  view('categories.edit',['Category'=>$Category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $Category )
    {
        //
        $request->validate([
            'CategoryName' => ['required', 'min:3'],
        ]);
        $Category->update([
            'Category_name'=> $request->CategoryName
        ]);
          return redirect("categoryindex");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        //
        $Category->delete();
        return redirect("categoryindex");
    }
}
