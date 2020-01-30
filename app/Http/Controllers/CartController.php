<?php

namespace App\Http\Controllers;

use App\Model\Admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart($id)
    {
        $product = Product::findOrFail($id);

        $data = array();
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        if ($product->discount_price == NULL){
            $data['price'] = $product->selling_price;
        } else {
            $data['price'] = $product->discount_price;
        }
        $data['weight'] = 1;
        $data['options']['image'] = $product->image_one;
        $data['options']['color'] = '';
        $data['options']['size'] = '';

        Cart::add($data);
        return response()->json(['success' => 'Successfully added on your cart!']);
    }

    public function showCartContent()
    {
        return view('pages.show_cart_content')->with('cart', Cart::content());
    }

    public function cartRemove($rowId)
    {
        Cart::remove($rowId);
        Session::flash('success', 'Successfully removed on your cart!');
        return back();
    }

    public function updateCartItem(Request $request)
    {
        $rowId = $request->product_rowId;
        $qty = $request->qty;

        Cart::update($rowId, $qty); // Will update the quantity
        Session::flash('success', 'Successfully updated on your cart!');
        return back();
    }

    public function check()
    {
        $content = Cart::content();
        return response()->json($content);
    }
}
