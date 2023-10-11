<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TrainerController extends Controller
{
     
    public function index(){
        $trainers = Trainer::get();     
        return view('admin.trainer.index',['trainers'=>$trainers]);
    }
    public function add(){
        return view('admin.trainer.add');
    }
    public function store( Request $request ){
        
        $request->validate([
            'name'=>'required | min:3 | regex:/^[a-zA-Z\s]*$/',
            'image'=>'required',
            'email'=>'required |unique:users',
            'password'=>'required',
            'contact'=>'required',
        ]);
        $imageName="";
        if ($request->hasFile('image')) {
            $imageName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME)
            ."_".time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/trainer/'), $imageName);
        }
        
        $trainer = Trainer::create([
            'name'=>$request->name,
            'image'=>$imageName,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'added_by'=>auth()->user()->id,
        ]);

        
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'trainer',
        ]);
        $trainer->update([
            'user_id'=>$user->id
        ]);

        return back()->with("success","Trainer Stored Successfully");
    }

    public function edit( $id ){
        $trainer = Trainer::find( $id );
        return view('admin.trainer.edit',compact('trainer'));        
    }
    
    public function update( Request $request ){


        $request->validate([
            'name'=>'required | min:3',
            'email'=>'required',
            'contact'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $imageName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME)
            ."_".time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/trainer/'), $imageName);
            Trainer::find( $request->id )->update([
                'image'=>$imageName,
            ]);
    
        }
        
        Trainer::find( $request->id )->update([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'added_by'=>auth()->user()->id,
        ]);
        $trainer = Trainer::find( $request->id );
        User::find($trainer->user_id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        if ($request->password) {
            User::find($trainer->user_id)->update([
                'password'=>Hash::make($request->password),
            ]);
        }
        return back()->with("success","Trainer Updated Successfully");

    }
    public function delete( $id ){
        $trainer = Trainer::find( $id );
        User::find( $trainer->user_id )->delete();
        $trainer->delete();
        return back()->with("danger","Trainer Deleted Successfully");
    }
}
