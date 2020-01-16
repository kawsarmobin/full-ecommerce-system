<?php

namespace App\Http\Controllers\Admin\Category;

use App\Model\Admin\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
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
        return view('admin.categories.brands')->with('brands', Brand::all());
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
            'name' => 'required|min:3|max:15|unique:brands',
        ]);

        $input = $request->all();

        if ($logo = $request->file('logo')) {
            $newName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(Brand::ATTACH_UPLOAD_PATH, $newName);
            $input['logo'] = $newName;
        }

        Brand::create($input);

        $notification = array(
            'messege' => 'Brand added successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.categories.brand_edit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:15',
        ]);

        $input = $request->all();

        if ($logo = $request->file('logo')) {
            $newName = time() . '.' . $logo->getClientOriginalExtension();
            unlink(Brand::ATTACH_UPLOAD_PATH . $brand->getOriginal('logo'));
            $logo->move(Brand::ATTACH_UPLOAD_PATH, $newName);
            $input['logo'] = $newName;
        }

        $brand->update($input);

        $notification = array(
            'messege' => 'Brand updated successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if ($brand->delete()) {
            unlink(Brand::ATTACH_UPLOAD_PATH . $brand->getOriginal('logo'));
            $notification = array(
                'messege' => 'Brand deleted successfully',
                'alert-type' => 'success'
            );
        }
        return back()->with($notification);
    }
}
