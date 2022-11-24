<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\OrderDetail;
use App\Models\Order;
use Session;
use Cart;

class OrderController extends Controller
{
    public function pending(){
        $data['orders'] = Order::where('status','0')->get();
        return view('backend.admin.order.pending',$data);
    }

    public function approve(){
        $data['orders'] = Order::where('status','1')->get();
        return view('backend.admin.order.approve',$data);
    }

    public function customer_approve_details($id){
        $orders = Order::find($id);
        $orders->status = '1';
        $orders->save();
        return redirect()->back();

    }
}
