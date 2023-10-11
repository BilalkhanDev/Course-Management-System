<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index(){
        $lectures = Lecture::has('course')->get();       
        return view('admin.lecture.index',['lectures'=>$lectures]);
    }
    public function add(){
        $courses = Course::get();
        return view('admin.lecture.add',compact('courses'));
    }
    public function store( Request $request ){
        
        $request->validate([
            'title'=>'required',
            'video'=>'required | mimes:mp4,ogx,oga,ogv,ogg,webm',
            'course'=>'required',
        ]);

        $imageName="";
        if ($request->hasFile('video')) {
            $imageName = pathinfo($request->video->getClientOriginalName(), PATHINFO_FILENAME)
            ."_".time().'.'.$request->video->extension();
            $request->video->move(public_path('uploads/courses/'), $imageName);
        }
        
        Lecture::create([
            'course_id'=>$request->course,
            'title'=>$request->title,
            'video'=>$imageName,
            'description'=>$request->description,
            'added_by'=>auth()->user()->id,
        ]);
        
        return back()->with("success","Lectures Stored Successfully");
    }

    public function edit( $id ){
        $lecture = Lecture::find( $id );
        $courses = Course::get();
        return view('admin.lecture.edit',['lecture'=>$lecture,'courses'=>$courses]);        
    }
    
    public function update( Request $request ){
        
        $request->validate([
            'title'=>'required',
            'course'=>'required',
        ]);

        $imageName="";
        if ($request->hasFile('video')) {
            $imageName = pathinfo($request->video->getClientOriginalName(), PATHINFO_FILENAME)
            ."_".time().'.'.$request->video->extension();
            $request->video->move(public_path('uploads/courses/'), $imageName);
        }
        
        Lecture::where( 'id',$request->id )->update([
            'course_id'=>$request->course,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        
        if ($imageName) {
            
            Lecture::where( 'id',$request->id )->update([
                'video'=>$imageName,
            ]);
        
        }
        
        return back()->with("success","Lecture Updated Successfully");
    }
    public function delete( $id ){
        Lecture::find( $id )->delete();
        return back()->with("danger","Lecture Deleted Successfully");
    }
}
