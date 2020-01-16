<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Newsletters;
use Illuminate\Http\Request;

class NewslettersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.newsletters')->with('newsletters', Newsletters::all());
    }

    public function destroy($id)
    {
        $newsletters = Newsletters::findOrFail($id);

        $newsletters->delete();

        $notification = array(
            'messege' => 'Subscriber deleted successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
