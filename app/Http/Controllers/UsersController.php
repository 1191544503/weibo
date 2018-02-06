<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    //
    public function create(){
        return view('users.create');
    }
    public function show(User $user){
        return view('users.show',compact('user'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'email|required|max:255|unique:users',
            'password'=>'required|confirmed|min:6',
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        Auth::login($user);
        session()->flash('success','注册成功，欢迎');//闪存
        return redirect()->route('users.show',[$user]);
    }
}
