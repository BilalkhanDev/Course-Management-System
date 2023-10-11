<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebsiteController extends Controller
{
    public function index(){
        $categories = Category::with('courses.trainer')->with(['courses'=>function($q){
            return $q->withCount('lectures as lectures');
        }])->get();
        $trainers = Trainer::has('course')->limit(6)->get();
        return view('front.index',compact('categories','trainers'));
    }
    public function aboutUs(){
        return view('front.about-us');
    }
    public function courses(){
        $courses = Course::with('category','trainer')->limit(9)->get();
        return view('front.courses',compact('courses'));
    }
    public function trainers(){
        $trainers = Trainer::with('Course')->get();
        // dd($trainers);
        return view('front.trainers',compact('trainers'));
    }
    public function join(){
        return view('front.join');
    }
    public function courseDetails( $id ){
        $course = Course::where('id',$id)->with('trainer','lectures')->withCount('lectures')->first();
        $relatedCourses = Course::where('category_id',$course->category_id)
        ->withCount('lectures as lectures')
        ->where('id','!=',$course->id)
        ->get();
        return view('front.course-details',compact('course','relatedCourses'));
    }
    public function categoryCourse( Request $request ){
        return Course::where('category_id',$request->id)
        ->with('trainer')
        ->withCount('lectures as lectures')->get();
    }
    public function create( Request $request ){

        $request->validate([
            'name'=>'required',
            'email'=>'required | unique:users',
            'password'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'student',
        ]);
        
        return redirect()->route('login-form')->with("success","Account Created Please Login With Your Account");

    }
    public function login(){
        return view('admin.auth.login');
    }
}
