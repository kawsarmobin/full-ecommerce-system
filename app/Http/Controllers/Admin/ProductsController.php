<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
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
        return view('admin.products.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create')
            ->with('categories', $categories)
            ->with('brands', $brands);
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
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required|min:3',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_details' => 'required|min:3',
            'product_color' => 'required',
            'product_size' => 'required',
            'selling_price' => 'required',
        ]);

        $input = $request->all();
        $input['status'] = 1;

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');

        if ($image_one && $image_two && $image_three) {
            $image_one_name = time() . uniqid() . Str::slug($request->product_name) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save(Product::ATTACH_UPLOAD_PATH . '/' . $image_one_name);
            $input['image_one'] = $image_one_name;

            $image_two_name = time() . uniqid() . Str::slug($request->product_name) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save(Product::ATTACH_UPLOAD_PATH . '/' . $image_two_name);
            $input['image_two'] = $image_two_name;

            $image_three_name = time() . uniqid() . Str::slug($request->product_name) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300, 300)->save(Product::ATTACH_UPLOAD_PATH . '/' . $image_three_name);
            $input['image_three'] = $image_three_name;
        } else {
            $image_one_name = time() . uniqid() . Str::slug($request->product_name) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save(Product::ATTACH_UPLOAD_PATH . '/' . $image_one_name);
            $input['image_one'] = $image_one_name;

            $image_two_name = time() . uniqid() . Str::slug($request->product_name) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save(Product::ATTACH_UPLOAD_PATH . '/' . $image_two_name);
            $input['image_two'] = $image_two_name;
        }

        Product::create($input);

        $notification = array(
            'messege' => 'Product added successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Admin\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Admin\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $sub_categories = Subcategory::all();
        $brands = Brand::all();
        return view('admin.products.edit')
            ->with('product', $product)
            ->with('categories', $categories)
            ->with('sub_categories', $sub_categories)
            ->with('brands', $brands);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Admin\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required|min:3',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_details' => 'required|min:3',
            'product_color' => 'required',
            'product_size' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
        ]);

        $input = $request->all();

        if ($image_one = $request->file('image_one')) {
            $image_one_name = time() . uniqid() . Str::slug($request->product_name) . '.' . $image_one->getClientOriginalExtension();
            unlink(Product::ATTACH_UPLOAD_PATH . '/' . $product->getOriginal('image_one'));
            Image::make($image_one)->resize(300, 300)->save(Product::ATTACH_UPLOAD_PATH . '/' . $image_one_name);
            $input['image_one'] = $image_one_name;
        }

        if ($image_two = $request->file('image_two')) {
            $image_two_name = time() . uniqid() . Str::slug($request->product_name) . '.' . $image_two->getClientOriginalExtension();
            unlink(Product::ATTACH_UPLOAD_PATH . '/' . $product->getOriginal('image_two'));
            Image::make($image_two)->resize(300, 300)->save(Product::ATTACH_UPLOAD_PATH . '/' . $image_two_name);
            $input['image_two'] = $image_two_name;
        }

        if ($image_three = $request->file('image_three')) {
            $image_three_name = time() . uniqid() . Str::slug($request->product_name) . '.' . $image_three->getClientOriginalExtension();
            if ($product->getOriginal('image_three')) {
                unlink(Product::ATTACH_UPLOAD_PATH . '/' . $product->getOriginal('image_three'));
            }
            Image::make($image_three)->resize(300, 300)->save(Product::ATTACH_UPLOAD_PATH . '/' . $image_three_name);
            $input['image_three'] = $image_three_name;
        }

        $product->update($input);

        $notification = array(
            'messege' => 'Product updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('products.show', $product->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Admin\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {

            if ($product->image_one && $product->image_two && $product->image_three) {
                unlink(Product::ATTACH_UPLOAD_PATH . '/' . $product->getOriginal('image_one'));
                unlink(Product::ATTACH_UPLOAD_PATH . '/' . $product->getOriginal('image_two'));
                unlink(Product::ATTACH_UPLOAD_PATH . '/' . $product->getOriginal('image_three'));
            } else {
                unlink(Product::ATTACH_UPLOAD_PATH . '/' . $product->getOriginal('image_one'));
                unlink(Product::ATTACH_UPLOAD_PATH . '/' . $product->getOriginal('image_two'));
            }

            $notification = array(
                'messege' => 'Product deleted successfully',
                'alert-type' => 'success'
            );
        }
        return back()->with($notification);
    }

    /**
     * Sub category collect by ajax request.
     *
     * @param $category_id
     * @return \Illuminate\Http\Response
     */
    public function getSubCategory($category_id)
    {
        $sub_category = Subcategory::where('category_id', $category_id)->get();
        return json_encode($sub_category);
    }

    /**
     * Product status change active or inactive.
     *
     * @param \App\Model\Admin\Product $product
     * @return \Illuminate\Http\Response
     */

    public function changeStatus(Product $product)
    {
        $product->status = !$product->status;
        $product->save();
        $notification = array(
            'messege' => 'Product status changed successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
