<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index(){
        $users = User::where('role','!=','trainer')->get();       
        return view('admin.user.index',['users'=>$users]);
    }
    public function add(){
        return view('admin.user.add');
    }
    public function store( Request $request ){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required | unique:users',
            'password'=>'required',
            'confirm_password'=>'required | same:password',
        ]);
        
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'admin',
        ]);
        
        return back()->with("success","Users Stored Successfully");
    }

    public function edit( $id ){
        $user = User::find( $id );
        return view('admin.user.edit',['user'=>$user]);        
    }
    
    public function update( Request $request ){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'confirm_password'=>'required | same:password',
        ]);
        
        User::where( 'id',$request->id )->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        
        if ($request->password) {
            User::where( 'id',$request->id )->update([
                'password'=>Hash::make($request->password),
            ]);
        }
        
        return back()->with("success","User Profile Updated Successfully");
    }
    public function delete( $id ){
        User::find( $id )->delete();
        return back()->with("danger","User Deleted Successfully");
    }

}
