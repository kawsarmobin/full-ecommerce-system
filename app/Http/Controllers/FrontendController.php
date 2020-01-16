<?php

namespace App\Http\Controllers;

use App\Model\Newsletters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function storeNewsLetters(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:newsletters'
        ]);

        Newsletters::create($request->all());
        Session::flash('success', 'Thanks for subscribing');
        return back();
    }
}
