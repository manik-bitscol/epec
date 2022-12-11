<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required | string | min:2',
        ]);
        // dd($request->all());
        try {
            Category::create($request->all());
            return redirect()->back()->withSuccess('New Category Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.category.index')->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return response()->json([
            'category' => $category,
            'status'   => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryId)
    {
        $request->validate([
            'name' => 'required | string | min:2',
        ]);

        try {
            Category::findOrFail($categoryId)->update($request->all());
            return redirect()->route('admin.category.index')->withSuccess('Category Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.category.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryId)
    {
        try {
            Category::findOrFail($categoryId)->delete();
            return redirect()->route('admin.category.index')->withSuccess('Category Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.category.index')->withError($e->getMessage());
        }
    }
}