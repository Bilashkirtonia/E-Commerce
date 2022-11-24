<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\models\About;

class AboutUsController extends Controller
{
    public function view_about(){
        $data['users'] = About::all();
        $logo = count(About::all());
        return view('backend.admin.about.user_view',compact('logo'),$data);
    }
    
    public function add_about(){
        $logo = count(About::all());
        return view('backend.admin.about.add_user');
    }

    public function store_about(Request $request){
        

        $data = new About();
        $data->created_by = Auth::User()->id;
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/about/').$data->image);
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/about'), $fileName);
            $data->image = $fileName;
        }
        $data->save();
        return redirect()->route('view_about')->with('success',"Logo update successfully!");
        
       
        
    }

    public function edit_about($id){
        $data['editSlide'] = About::find($id);
        return view('backend.admin.about.add_user',$data);
    }

    public function update_about(Request $request,$id){

        $data = About::find($id);
        $data->upload_by = Auth::User()->id;
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/about/').$data->image);
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/about'), $fileName);
            $data->image = $fileName;
        }
        $data->save();
        return redirect()->route('view_about')->with('success',"Logo update successfully!");
        
    }

    public function delete_about($id){

        $logo = About::find($id);
        $logo->delete();
        return redirect()->route('view_about')->with('success','Delete successfully!');

    }


    
}
