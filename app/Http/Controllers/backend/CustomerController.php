<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class CustomerController extends Controller
{
    public function V_view(){
        $data['users'] = User::where('usertype','customer')->where('status','0')->get();
        return view('backend.admin.customer.index',$data);
    }

    public function D_add(){
        $data['users'] = User::where('usertype','customer')->where('status','1')->get();
        return view('backend.admin.customer.draft',$data);
    }
    public function delete($id){

        User::where('id',$id)->delete();
        return redirect()->route('draft_view');
    }
    
}
