<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = product::with('category','brand')->get();
        return view('dashboard.products.index',compact('products'));
    }

    public function create(){
        $categories = Category::all();
        $brands= Brand::all();
        return view('dashboard.products.create',compact('categories','brands'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:products,name',
             'slug'=>'required',
             'price'=>'required|numeric',
             'stock'=>'required|integer',
             'category_id'=>'required|exists:categories,id',
             'brand_id'=>'nullable|exists:brands,id',
             'description'=>'nullable|string',
             'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null;
        Product::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'category_id' => $request->category_id,
        
            'brand_id'=>$request->brand_id,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'image' => $imagePath,
            'description'=>$request->description

        ]);
        return redirect()->route('categories.index')->with('success','New category added Successfully');


    }
    
}
