<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Auth;

class SliderController extends Controller
{
    public function view_slide(){
        $data['users'] = Slider::all();
        $logo = count(Slider::all());
        return view('backend.admin.slider.user_view',compact('logo'),$data);
    }
    
    public function add_slide(){
        $logo = count(Slider::all());
        return view('backend.admin.slider.add_user');
    }

    public function store_slide(Request $request){
        

        $data = new Slider();
        $data->created_by = Auth::User()->id;
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/slider/').$data->image);
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/slider'), $fileName);
            $data->image = $fileName;
        }
        $data->save();
        return redirect()->route('view_slide')->with('success',"Logo update successfully!");
        

       
        
    }

    public function edit_slide($id){
        $data['editSlide'] = Slider::find($id);
        return view('backend.admin.slider.add_user',$data);
    }

    public function update_slide(Request $request,$id){

        $data = Slider::find($id);
        $data->upload_by = Auth::User()->id;
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/slider/').$data->image);
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/slider'), $fileName);
            $data->image = $fileName;
        }
        $data->save();
        return redirect()->route('view_slide')->with('success',"Logo update successfully!");
        
    }

    public function delete_slide($id){

        $logo = Slider::find($id);
        if(file_exists('public/upload/slider/'. $logo->image) && !empty($logo->image)){
            unlink('public/upload/slider/' . $logo->image); 
        }
        $logo->delete();
        return redirect()->route('view_slide')->with('success','Delete successfully!');

    }


    
}
