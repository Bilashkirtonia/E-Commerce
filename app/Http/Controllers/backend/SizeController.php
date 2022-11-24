<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Size;
use Auth;
use DB;

class SizeController extends Controller
{
    public function view(){
        $data['users'] = Size::all();
        $logo = count(Size::all());
        return view('backend.admin.size.view_category',compact('logo'),$data);
    }
    
    public function add(){
        $logo = count(Size::all());
        return view('backend.admin.size.add_category');
    }

    public function store(Request $request){
        $request->validate([
            'size'=>'required|unique:sizes,name'
        ]);

        $data = new Size();
        $data->created_by = Auth::User()->id;
        $data->name = $request->size;
        $data->save();
        return redirect()->route('view_size')->with('success',"Size update successfully!");
 
    }

    public function edit($id){
        $data['editSlide'] = Size::find($id);
        return view('backend.admin.size.add_category',$data);
    }

    public function update(Request $request,$id){
        $request->validate([
            'size'=>'required|unique:sizes,name'
        ]);
        
        $data = Size::find($id);
        $data->upload_by = Auth::User()->id;
        $data->name = $request->size;
        $data->save();
        return redirect()->route('view_size')->with('success',"brand update successfully!");

        
    }

    public function delete($id){

        $logo = Size::find($id);
        $logo->delete();
        return redirect()->route('view_size')->with('success','Delete successfully!');

    }


    
}
