<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();       
        return view('admin.category.index',['categories'=>$categories]);
    }
    public function add(){
        return view('admin.category.add');
    }
    public function store( Request $request ){
        
        $request->validate([
            'name'=>'required',
        ]);

        Category::create([
            'name'=>$request->name
        ]);
        
        return back()->with("success","Category Stored Successfully");
    }

    public function edit( $id ){
        $category = Category::find( $id );
        return view('admin.category.edit',['category'=>$category]);        
    }
    
    public function update( Request $request ){
        
        $request->validate([
            'name'=>'required',
        ]);

        Category::where( 'id',$request->category_id )->update([
            'name'=>$request->name
        ]);
        
        return back()->with("success","Category Updated Successfully");
    }
    public function delete( $id ){
        Category::find( $id )->delete();
        return back()->with("danger","Category Deleted Successfully");
    }
}