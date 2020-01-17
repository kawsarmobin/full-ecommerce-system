<?php

namespace App\Http\Controllers;

use App\Model\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistsController extends Controller
{
    public function store($id)
    {
        $user_id = Auth::id();
        $check = Wishlist::where(['user_id' => $user_id, 'product_id' => $id])->first();

        if (Auth::check()) {
            if ($check) {
                return response()->json(['error' => 'Product already has your wishlist!']);
            } else {
                $wishlist = new Wishlist();

                $wishlist->user_id = $user_id;
                $wishlist->product_id = $id;
                $wishlist->save();

                return response()->json(['success' => 'Successfully add to wishlist!']);
            }
        } else {
            return response()->json(['error' => 'Please login first on your account!']);
        }
    }
}
