<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Color;
use App\Models\Size;
use App\Models\Communication;
use App\Models\Product;
use Mail;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use App\Models\User;
use Cart;
use Auth;


class DashbordController extends Controller
{
    public function login(Request $request){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['user'] = Auth::user();
      
        return view('fronted.singlepage.dashbord',$data);
    }

    public function contact_us(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.singlepage.contact_us',$data);
    }

    
    public function Dashbord_edit(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['user'] = Auth::user();
        return view('fronted.singlepage.Dashbord_edit',$data);
    }

    public function update_dashbord(Request $request){
        $auth = Auth::user()->id;
        $data = User::find($auth);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        $data->address = $request->address;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_image/').$data->image);
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_image'), $fileName);
            $data->image = $fileName;
        }
        $data->save();
        return redirect()->route('dashbord')->with('success',"dashbord update successfully!");
    }
    public function change_password(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['user'] = Auth::user();
        return view('fronted.singlepage.changepassword',$data);
    }
    public function update_password(Request $request){
       
        $auth = Auth::user()->id;
        $password = Auth::user()->password;

        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required',
        ]);
        dd($password);
        $password = $request->newpassword;
        
        if($auth == true && $password == true){
        
        $data = User::find($auth);
        $data->password = bcrypt($request->newpassword);
        $data->save();
        return redirect()->route('dashbord')->with('success',"password update successfully!");
        }else{
            return redirect()->back()->with('success',"password dose not match!");

        }
        
    }
}
