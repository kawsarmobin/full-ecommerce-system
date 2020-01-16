<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
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
        return view('admin.categories.sub_categories')
            ->with('categories', Category::orderBy('name')->get())
            ->with('sub_categories', Subcategory::with('category')->orderBy('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        Subcategory::create($request->all());

        $notification = array(
            'messege' => 'Sub category added successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Subcategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $sub_category)
    {
        return view('admin.categories.sub_category_edit')
            ->with('categories', Category::all())
            ->with('sub_category', $sub_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Subcategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $sub_category)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        if ($sub_category->update($request->all())) {
            $notification = array(
                'messege' => 'Sub category updated successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'messege' => 'Nothing to update!',
                'alert-type' => 'warning'
            );
        }

        return redirect()->route('sub-category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Subcategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $sub_category)
    {
        $sub_category->delete();
        $notification = array(
            'messege' => 'Sub category deleted successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
