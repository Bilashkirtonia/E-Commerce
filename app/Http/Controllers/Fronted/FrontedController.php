<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Communication;
use App\Models\Product;
use Mail;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use App\Models\About;
use Cart;
class FrontedController extends Controller
{
    
    public function index(){
        $data['logo'] = Logo::first();
        $data['slider'] = Slider::all();
        $data['contact'] = Contact::first(); 
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get(); 
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get(); 
        $data['products'] = Product::orderBy('id','DESC')->paginate(3); 

      
        // $data['contact'] = Contact::first();       
        return view('fronted.home',$data);
    }
    public function product_list(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first(); 
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get(); 
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get(); 
        $data['products'] = Product::orderBy('id','DESC')->paginate(3); 
        return view('fronted.singlepage.product_list',$data);
    }
    public function category_product_list($category_id){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first(); 
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get(); 
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get(); 
        $data['products'] = Product::where('category_id',$category_id)->orderBy('id','DESC')->get(); 
        return view('fronted.singlepage.category_product_list',$data);
    }

    public function brand_product_list($brand_id){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first(); 
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get(); 
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get(); 
        $data['products'] = Product::where('brand_id',$brand_id)->orderBy('id','DESC')->get(); 
        return view('fronted.singlepage.brand_product_list',$data);
    }

    public function product_details_show($slug){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first(); 
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get(); 
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get(); 
        $data['products'] = Product::where('slug',$slug)->first();
        $data['ProductSubImage'] = ProductSubImage::where('product_id',$data['products']->id)->get();
        $data['ProductSize'] = ProductSize::where('product_id',$data['products']->id)->get();
        $data['ProductColor'] = ProductColor::where('product_id',$data['products']->id)->get();

        return view('fronted.singlepage.product_details',$data);
    }


    public function about_us(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        return view('fronted.singlepage.about_us',$data);
    }
    public function contact_us(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.singlepage.contact_us',$data);
    }

    public function shopping_cart(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.singlepage.shopping_cart',$data);
    }


    public function product(){
        
    }

    public function message(Request $request){
        $data = new Communication();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->message = $request->message;
        $data->save();

        $mail = array(
            'name' =>$request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'msg' => $request->message
        );
        Mail::send('fronted.mail.index',$mail,function($message) use($mail){
            $message->from('rahulshimg329033@gmail.com','bilashkirtonia');
            $message->to($mail['email']);
            $message->subject('Thank you for contact us');
        });
        return redirect()->back();
    }


}
