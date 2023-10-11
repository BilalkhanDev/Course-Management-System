<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(){
        $announcements = Announcement::get();       
        return view('admin.announcement.index',['announcements'=>$announcements]);
    }
    public function add(){
        return view('admin.announcement.add');
    }
    public function store( Request $request ){

        $request->validate([
            'content'=>'required',
        ]);

        Announcement::create([
            'content'=>$request->content,
            'is_active'=>$request->active=="on"?1:0,
            'added_by'=>auth()->user()->id,
        ]);
        
        return back()->with("success","Announcement Stored Successfully");
    }

    public function edit( $id ){
        $announcement = Announcement::find( $id );
        return view('admin.announcement.edit',['announcement'=>$announcement]);        
    }
    
    public function update( Request $request ){
        
        $request->validate([
            'content'=>'required',
        ]);

        Announcement::where( 'id',$request->id )->update([
            'is_active'=>$request->active=="on"?1:0,
            'content'=>$request->content
        ]);
        
        return back()->with("success","Announcement Updated Successfully");
    }
    public function delete( $id ){
        Announcement::find( $id )->delete();
        return back()->with("danger","Announcement Deleted Successfully");
    }
}
