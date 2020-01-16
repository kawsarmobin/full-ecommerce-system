<?php

namespace App\Http\Controllers\Admin\Category;

use App\Model\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.categories')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:15|unique:categories',
        ]);

        Category::create($request->all());

        $notification = array(
            'messege' => 'Category added successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Admin\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.category_edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Admin\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:15',
        ]);

        if ($category->update($request->all())) {
            $notification = array(
                'messege' => 'Category updated successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'messege' => 'Nothing to update!',
                'alert-type' => 'warning'
            );
        }

        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Admin\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $notification = array(
            'messege' => 'Category deleted successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
