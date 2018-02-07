<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;


class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest',[
            'only'=>['create'],
        ]);
    }

    public function create(){
        return view('sessions.create');
    }
    public function store(Request $request){
        $cred=$this->validate($request,[
            'email'=>'required|email|max:255',
            'password'=>'required',
        ]);
        if(Auth::attempt($cred,$request->has('remember'))){
            if(Auth::User()->activated) {
                session()->flash('success', '欢迎回来！');
                return redirect()->intended(route('users.show', [Auth::user()]));
            }else{
                Auth::logout();
                session()->flash('warning','您的账号未激活请到邮箱中激活');
                return redirect('/');
            }
        }else{
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }
    }
    public function destory(){
        Auth::logout();
        session()->flash('success','您已成功退出');
        return redirect('login');
    }
}
