<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Trainer;
use Illuminate\Http\Request;

class CourseController extends Controller
{    
    public function index(){
        $courses = Course::has('category')->get();       
        
        if (auth()->user()->role=="trainer") {
            $trainer_id = Trainer::where('user_id',auth()->user()->id)->value('id');
            $courses = Course::has('category')->where('trainer_id',$trainer_id)->get();
        }
        return view('admin.course.index',['courses'=>$courses]);
    }
    public function add(){
        $categories = Category::get();
        $trainers = Trainer::get();
        return view('admin.course.add',compact('categories','trainers'));
    }
    public function store( Request $request ){
        
        $request->validate([
            'name'=>'required',
            'code'=>'required',
            'category'=>'required',
            'image'=>'required',
        ]);
        if(auth()->user()->role=='admin')
        {
            $request->validate([
                'trainer'=>'required',
            ]);
        }
        $imageName="";
        if ($request->hasFile('image')) {
            $imageName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME)
            ."_".time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/courses/'), $imageName);
        }
        
        Course::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'category_id'=>$request->category,
            'meeting_link'=>$request->meeting_link,
            'meeting_date'=>$request->meeting_date,
            'meeting_time'=>$request->meeting_time,
            'trainer_id'=>$request->trainer??auth()->user()->id,
            'description'=>$request->description,
            'image'=>$imageName,
            'added_by'=>auth()->user()->id,
        ]);
        
        return back()->with("success","Course Stored Successfully");
    }

    public function edit( $id ){
        $course = Course::find( $id );
        $categories = Category::get();
        $trainers = Trainer::get();       
        return view('admin.course.edit',compact('course','categories','trainers'));        
    }
    
    public function update( Request $request ){


        $request->validate([
            'name'=>'required',
            'code'=>'required',
            'category'=>'required',
            'trainer'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $imageName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME)
            ."_".time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/courses/'), $imageName);
            Course::find( $request->id )->update([
                'image'=>$imageName,
            ]);
    
        }
        
        Course::find( $request->id )->update([
            'name'=>$request->name,
            'code'=>$request->code,
            'category_id'=>$request->category,
            'meeting_link'=>$request->meeting_link,
            'meeting_date'=>$request->meeting_date,
            'meeting_time'=>$request->meeting_time,
            'trainer_id'=>$request->trainer,
            'description'=>$request->description,
            'added_by'=>auth()->user()->id,
        ]);
        
        return back()->with("success","Course Updated Successfully");

    }
    public function delete( $id ){
        Course::find( $id )->delete();
        return back()->with("danger","Course Deleted Successfully");
    }
}
