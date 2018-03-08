<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\status;
use App\user;

class StaticPageController extends Controller
{
    public function home(){
        $feed_items=[];
        if(Auth::check()){
            $feed_items=Auth::user()->feed()->paginate(30);
        }
        return view('static_page/home',compact('feed_items'));

    }
    public function  about(){
        return view('static_page/about');
    }
    public  function help(){
        return view('static_page/help');
    }
}
