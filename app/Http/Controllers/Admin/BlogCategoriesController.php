<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoriesController extends Controller
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
        return view('admin.blog.categories.index')->with('blog_categories', BlogCategory::all());
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
            'name_en' => 'required|min:3',
            'name_en' => 'required|min:3',
        ]);

        BlogCategory::create($request->all());

        $notification = array(
            'messege' => 'Blog category added successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\BlogCategory  $blog_category
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blog_category)
    {
        return view('admin.blog.categories.edit')->with('blog_category', $blog_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\BlogCategory  $blog_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blog_category)
    {
        $this->validate($request, [
            'name_en' => 'required|min:3',
            'name_en' => 'required|min:3',
        ]);

        $blog_category->update($request->all());

        $notification = array(
            'messege' => 'Blog category updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog-categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\BlogCategory  $blog_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blog_category)
    {
        $blog_category->delete();

        $notification = array(
            'messege' => 'Blog category deleted successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
