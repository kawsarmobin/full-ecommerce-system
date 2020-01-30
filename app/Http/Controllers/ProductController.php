<?php

namespace App\Http\Controllers;

use App\Model\Admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function productView($id, $product_name)
    {
        $product = Product::find($id);

        $product_color = explode(',', $product->product_color);
        $product_size = explode(',', $product->product_size);

        return view('pages.product_details', compact('product', 'product_color', 'product_size'));
    }

    public function cartProductAdd(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = array();
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['qty'] = $request->qty;
        if ($product->discount_price == NULL){
            $data['price'] = $product->selling_price;
        } else {
            $data['price'] = $product->discount_price;
        }
        $data['weight'] = 1;
        $data['options']['image'] = $product->image_one;
        $data['options']['color'] = $request->color;
        $data['options']['size'] = $request->size;

        Cart::add($data);
        Session::flash('success', 'Successfully added on your cart!');
        return redirect()->to('/');
    }
}
