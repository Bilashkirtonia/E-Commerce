<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Auth;
use DB;


class BrandController extends Controller
{
    public function view(){
        $data['users'] = Brand::all();
        // $logo = count(Product::where('category_id',$data['users']['0']->id));
        return view('backend.admin.brand.view_category',$data);
    }
    
    public function add(){
        $logo = count(Brand::all());
        return view('backend.admin.brand.add_category');
    }

    public function store(Request $request){
        $request->validate([
            'brand'=>'required|unique:brands,name'
        ]);

        $data = new Brand();
        $data->created_by = Auth::User()->id;
        $data->name = $request->brand;
        $data->save();
        return redirect()->route('view_brand')->with('success',"brand update successfully!");
 
    }

    public function edit($id){
        $data['editSlide'] = Brand::find($id);
        return view('backend.admin.brand.add_category',$data);
    }

    public function update(Request $request,$id){
        $request->validate([
            'brand'=>'required|unique:brands,name'
        ]);
        
        $data = Brand::find($id);
        $data->upload_by = Auth::User()->id;
        $data->name = $request->brand;
        $data->save();
        return redirect()->route('view_brand')->with('success',"brand update successfully!");

        
    }

    public function delete($id){

        $logo = Brand::find($id);
        $logo->delete();
        return redirect()->route('view_brand')->with('success','Delete successfully!');

    }


    
}
