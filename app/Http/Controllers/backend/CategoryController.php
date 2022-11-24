<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Auth;
use DB;
use App\Http\request\CategoryRequeat;

class CategoryController extends Controller
{
    public function view_category(){
        $data['users'] = Category::all();
        // $logo = count(Product::all());
        return view('backend.admin.category.view_category',$data);
    }
    
    public function add_category(){
        $logo = count(Category::all());
        return view('backend.admin.category.add_category');
    }

    public function store_category(Request $request){
        $request->validate([
            'category'=>'required'
        ]);

        $data = new Category();
        $data->created_by = Auth::User()->id;
        $data->name = $request->category;
        $data->save();
        return redirect()->route('view_category')->with('success',"category update successfully!");
 
    }

    public function edit_category($id){
        $data['editSlide'] = Category::find($id);
        return view('backend.admin.category.add_category',$data);
    }

    public function update_category(CategoryRequeat $request,$id){

        $request->validate([
            'category'=>'required'
        ]);

        $data = Category::find($id);
        $data->upload_by = Auth::User()->id;
        $data->name = $request->category;
        $data->save();
        return redirect()->route('view_category')->with('success',"category update successfully!");

        
    }

    public function delete_category($id){

        $logo = Category::find($id);
        $logo->delete();
        return redirect()->route('view_category')->with('success','Delete successfully!');

    }


    
}
