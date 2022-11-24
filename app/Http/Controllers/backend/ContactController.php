<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\models\Contact;

class ContactController extends Controller
{
    public function view_contact(){
        $data['users'] = Contact::all();
        $logo = count(Contact::all());
        return view('backend.admin.contact.user_view',compact('logo'),$data);
    }
    
    public function add_contact(){
        $logo = count(Contact::all());
        return view('backend.admin.contact.add_user');
    }

    public function store_contact(Request $request){
        

        $data = new Contact();
        $data->created_by = Auth::User()->id;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->google = $request->google;
        $data->save();
        return redirect()->route('view_contact')->with('success',"Logo update successfully!");
        

       
        
    }

    public function edit_contact($id){
        $data['editSlide'] = Contact::find($id);
        return view('backend.admin.contact.add_user',$data);
    }

    public function update_contact(Request $request,$id){

        $data = Contact::find($id);
        $data->upload_by = Auth::User()->id;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->google = $request->google;
        $data->save();
        return redirect()->route('view_contact')->with('success',"mission update successfully!");
        
    }

    public function delete_contact($id){

        $logo = Contact::find($id);
        $logo->delete();
        return redirect()->route('view_contact')->with('success','Delete successfully!');

    }


    
}
