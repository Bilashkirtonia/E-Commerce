<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Auth;
use DB;

class ColorController extends Controller
{
    public function view(){
        $data['users'] = Color::all();
        $logo = count(Color::all());
        return view('backend.admin.color.view_category',compact('logo'),$data);
    }
    
    public function add(){
        $logo = count(Color::all());
        return view('backend.admin.brand.add_category');
    }

    public function store(Request $request){
        $request->validate([
            'color'=>'required|unique:colors,name'
        ]);

        $data = new Color();
        $data->created_by = Auth::User()->id;
        $data->name = $request->color;
        $data->save();
        return redirect()->route('view_color')->with('success',"Color update successfully!");
 
    }

    public function edit($id){
        $data['editSlide'] = Color::find($id);
        return view('backend.admin.brand.add_category',$data);
    }

    public function update(Request $request,$id){
        $request->validate([
            'color'=>'required|unique:colors,name'
        ]);
        
        $data = Color::find($id);
        $data->upload_by = Auth::User()->id;
        $data->name = $request->color;
        $data->save();
        return redirect()->route('view_color')->with('success',"brand update successfully!");

        
    }

    public function delete($id){

        $logo = Color::find($id);
        $logo->delete();
        return redirect()->route('view_color')->with('success','Delete successfully!');

    }


    
}
