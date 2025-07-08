<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use PDO;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('dashboard.categories.index',compact('categories'));
    }
    public function create(){
        return view('dashboard.categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:categories',
             'slug'=>'required'
        ]);
        Category::create([
            'name'=>$request->name,
            'slug'=>$request->slug
        ]);
        return redirect()->route('categories.index')->with('success','New Brand added Successfully');


    }
    public function edit($id){
        $category=Category::findOrFail($id);
        return view('dashboard.categories.edit',compact('category'));
    }
    public function update(Request $request ,$id){
        ////validate the incoming request Data
        $request->validate([
            'name'=>'required|unique:categories,name,'.$id,

        ]);
///update the category details
        $category=Category::findOrFail($id);
        $category->update([
            'name'=>$request->name,
            'slug'=>strtolower(str_replace('','-',$request->name))
        ]);
        return redirect()->route('categories.index')->with('success','update');
    }
}
