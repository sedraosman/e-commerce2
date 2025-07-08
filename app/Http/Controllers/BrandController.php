<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::all();
        return view('dashboard.brands.index',compact('brands'));
    }
    public function create(){
        return view('dashboard.brands.create');
    }
    //request istek 

    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:brands',
            'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
                
        ]);
    //uplode image
    $logoPath = $request ->file('logo')?
    $request->file('logo')->store('brands','public'):null;
    
    Brand::create([
        'name'=>$request->name,
        'logo'=>$logoPath

    

    ]);
    return redirect()->route('brands.index')->with('success','New Brand added Successfully');

}
public function edit($id){
    //fech the brand by its ID
    $brand = Brand::findOrFail($id);
    return view('dashboard.brands.edit',compact('brand'))
;
}
public function update(Request $request,$id){
    ////vakideate the incoming request Data
$request->validate([

    'name'=>'required|unique:brands,name,'.$id,
    'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2028',

]);
///find the brand to update
$brand =Brand::findOrFail($id);

if($request->hasFile('logo')){
    $logoPath=$request->file('logo')->store('brand','public');
}
else{
    $logoPath=$brand->logo;////keep the old logo no new one is uploded
}
////update the product details

$brand->Update(['name'=>$request->name,
        'logo'=>$logoPath
]);
return redirect()->route('brands.index')->with('success','Update');
    



}
}
