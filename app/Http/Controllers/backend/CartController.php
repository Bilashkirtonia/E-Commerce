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
use Cart;

class CartController extends Controller
{
    public function Addtocart(Request $request){
        $product = Product::where('id',$request->id)->first();
        $sizes = Size::where('id',$request->id)->first();
        $colors = Color::where('id',$request->id)->first();
        Cart::add([
            'id'=>$product->id,
            'qty'=>$request->qty,
            'price'=>$product->price,
            'name'=>$product->name,
            'weight'=>540,
            'options'=>[
                'size_id'=>$request->size_id,
                'size_name' => $sizes->name,
                'color_id'=>$request->color_id,
                'color_name' => $colors->name,
                'image' => $product->image,

            ],
        ]);
        return redirect()->route('show_to_cart')->with('success','Data insert successfull');

    }

    public function Showtocart(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('fronted.singlepage.shopping_cart',$data);
    }

    public function Deletetocart($rowId){
        Cart::remove($rowId);
        return redirect()->route('show_to_cart')->with('success','Data insert successfull');

    }
}
