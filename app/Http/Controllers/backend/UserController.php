<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function view_user(){
        $data['users'] = User::where('usertype','admin')->where('status','1')->get();
        return view('backend.admin.user.user_view',$data);
    }
    
    public function add_user(){
        return view('backend.admin.user.add_user');
    }

    public function store_user(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:Users,email',
            'password'=>'required',
            'password2'=>'required'
        ]);

        $data = new User();
        $data->usertype = 'admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->route('view_user')->with('success','Data insert successfully!');

        
    }

    public function edit_user($id){
        $data['editUser'] = User::find($id);
        return view('backend.admin.user.add_user',$data);
    }

    public function update_user(Request $request,$id){

        $data = User::find($id);
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('view_user')->with('success','Data update successfully!');

    }

    public function delete_user($id){
        User::find($id)->delete();
        return redirect()->route('view_user')->with('success','Delete successfully!');

    }


    
}
