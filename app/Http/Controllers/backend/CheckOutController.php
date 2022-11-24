<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\User;
use App\Models\{Contact,Communication};
use DB;
use Mail;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use Auth;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\OrderDetail;
use App\Models\Order;
use Session;
use Cart;


class CheckOutController extends Controller
{
    public function customerLogin(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.singlepage.customer_login',$data);
    }

    public function customerReg(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.singlepage.customer_registation',$data);
    }
    public function varifiy($email){

        $data['email'] = $email;
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.mail.varifiy',$data);
    }
    public function Vcode(Request $request){
        $request->validate([
            'code'=>'required'
        ]);

        $email = $request->email;
        $code = $request->code;

        $data = User::where('email',$email)->where('code',$code)->first();
     

        if($data){
            $data->status = '0';
            $data->save();
            return redirect()->route('customer_login');
        }else{
            return redirect()->back()->with('errors','Sorry! Code dose not match');
        }
        
    }
    

    public function signup(Request $request){
        DB::transaction(function () use($request){
          $request->validate([
            'name'=>'required',
            'email'=>'required|unique:Users,email',
            'mobile'=>'required','unique:Users,mobile',
            'password'=>'min:9|required_with:confirm_password|same:confirm_password',
            'confirm_password'=>'min:9',
          ]);
        $code = rand(0000,9999);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->password = bcrypt($request->password);
        $data->code = $code;
        $data->usertype = 'customer';
        $data->status = 1;
        $data->save();

        $mail = array(
            
            'email' => $request->email,
            'code' => $code,
        );
        Mail::send('fronted.mail.index',$mail,function($message) use($mail){
            $message->from('bilashkirtonia94@gmail.com','bilashkirtonia');
            $message->to($mail['email']);
            $message->subject('Thank you for contact us');
        });
        });
        return redirect()->route('verification',$request->email)->with('success','Email send successfully');

    }
    public function check_out(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.singlepage.check_out',$data);
    }
    public function customer_check_out(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|',
            'mobile'=>'required',
            'address'=>'required',
          ]);

        $data = new Shipping();
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->save();
        Session::put('shipping_id',$data->id);
        return redirect()->route('payment_method')->with('success','Email send successfully'); 
    }
    public function payment_method(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.singlepage.payment_method',$data);
    }

    public function payment_store(Request $request){
        if($request->product_id == null){
            return redirect()->back()->with('errors','Sorry! add product');
        }else{
            $request->validate([
                'payment_method'=>'required'
            ]);
            if($request->payment_method == 'bikash' && $request->transcation_no == NULL){
                return redirect()->back()->with('errors','Sorry! add payment method');
            }
            DB::transaction(function () use($request) {
                $payment = new Payment();
                $payment->payment_method = $request->payment_method;
                $payment->transaction_no = $request->transcation_no;
                $payment->save();
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->shipping_id = Session::get('shipping_id');
                $order->payment_id = $payment->id;
                $order_data = Order::orderBy('id','desc')->first();
                if($order_data == NULL){
                    $firstReg = 0;
                    $order_no = $firstReg +1;
                }else{
                    $order_data = Order::orderBy('id','desc')->first()->order_no;
                    $order_no = $order_data+1;
                }
                $order->order_no = $order_no;
                $order->order_total = $request->order_total;
                $order->status = '0';
                $order->save();
                $contents = Cart::content();
                if($contents == null){
                    return redirect()->back()->with('errors','Sorry! Product dose not match');
                }else{
                    foreach ($contents as $key => $content) {
                        $order_details = new OrderDetail();
                        $order_details->order_id = $order->id;
                        $order_details->product_id = $content->id;
                        $order_details->color_id = $content->options->color_id;
                        $order_details->size_id = $content->options->size_id;
                        $order_details->quantity = $content->qty;
                        $order_details->save();
                    }
                }
            });

        }
       
        
        
        Cart::destroy();
        return redirect()->route('my_order')->with('success','Email send successfully'); 
    }
    public function my_order(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['orders'] = Order::where('user_id',Auth::user()->id)->get();
        return view('fronted.singlepage.my_order',$data); 
    }

    public function customer_order_details($id){
        $orders = Order::find($id);
        $data['orders'] = Order::where('id',$orders->id)->where('user_id',Auth::user()->id)->first();
        if($data['orders'] == false){
            return redirect()->back();
        }else{
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.singlepage.customer_order_details',$data); 
        }
        
    }



































}
