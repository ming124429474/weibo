<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Status;
class StaticPagesController extends Controller
{
    //
    public function home()
    {
//        return '主页';
        $feed_items = [];
        if(Auth::check()){
            $feed_items = Auth::user()->feed()->paginate(10);
        }
        return view('static_pages/home',compact('feed_items'));
    }

    public function help()
    {
//        return '帮助页';
        return view('static_pages/help');
    }

    public function about()
    {
//        return '关于';
        return view('static_pages/about');
    }
}
