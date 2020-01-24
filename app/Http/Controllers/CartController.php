<?php

namespace App\Http\Controllers;

use App\Model\Admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

        Cart::add($data);
        return response()->json(['success' => 'Successfully add your cart!']);
    }

    public function check()
    {
        $content = Cart::content();
        return response()->json($content);
    }
}
