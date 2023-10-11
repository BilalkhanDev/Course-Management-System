<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }
    public function login( Request $request ){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role!='trainer'&&auth()->user()->role!='admin') {
                return redirect('/');
            }
            return redirect()->route('category');

        }
        else{
            return back()->with('danger',"Invalid Credentials !!!!!");
        }
    }
    public function logout(){

        Auth::logout();
        return back();
        
    }
}
