<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;

class ProductController extends Controller
{
    public function view(){
        $data['users'] = Product::all();
        $logo = count(Product::all());
        return view('backend.admin.product.view_category',compact('logo'),$data);
    }
    
    public function add(){
        
        $data['categorys'] = Category::all();
        $data['brands'] = Brand::all();
        $data['sizes'] = Size::all();
        $data['colors'] = Color::all();
        return view('backend.admin.product.add_category',$data);
    }

    public function store(Request $request){
        DB::transaction(function() use($request){
            

            $data = new Product();
            $data->name = $request->product;
            $data->slug = $request->product;
            $data->category_id = $request->category_id;
            $data->brand_id = $request->brand_id;
            $data->short_desc = $request->short_title;
            $data->long_desc = $request->long_title;
            $data->price = $request->price;
            $image = $request->file('image');
            if($image){
                $imageName = time().'.'.$image->getClientOriginalName();
                $image->move(public_path('upload/product_img'),$imageName);
                $data->image = $imageName;
            }  
            if($data->save()){
                $files = $request->sub_image;
                if(!empty($files)){
                    foreach ($files as $file) {
                        $imageName2 = time().'.'.$file->getClientOriginalName();
                        $file->move(public_path('upload/product_sub_img'),$imageName2);
                        $subImage = new ProductSubImage();
                        $subImage->product_id = $data->id;
                        $subImage->sub_image = $imageName2;
                        $subImage->save();
                    }

                }

                $colors = $request->color_id;
                if(!empty($colors)){
                    foreach ($colors as $key => $color) {
                        
                        $productColor = new ProductColor();
                        $productColor->product_id = $data->id;
                        $productColor->color_id = $color;
                        $productColor->save();
                    }

                }

                $sizes = $request->size_id;
                if(!empty($sizes)){
                    foreach ($sizes as $key => $size) {
                        $productsize = new ProductSize();
                        $productsize->product_id = $data->id;
                        $productsize->size_id = $size;
                        $productsize->save();
                    }

                }
            } else{
                return redirect()->back()->with('success','Data not found');
            }

        });
       
       return redirect()->route('view_product')->with('success',"Product update successfully!");
    
        
    }

    public function edit($id){
        $data['editSlide'] = Product::find($id);
        $data['categorys'] = Category::all();
        $data['brands'] = Brand::all();
        $data['sizes'] = Size::all();
        $data['colors'] = Color::all();
        $data['colorId']=ProductColor::select('color_id')->where('product_id',$data['editSlide']->id)->orderBy('id','asc')->get()->toArray();
        $data['sizeId']=ProductSize::select('size_id')->where('product_id',$data['editSlide']->id)->orderBy('id','asc')->get()->toArray();
        
        return view('backend.admin.product.add_category',$data);
    }

    public function update(Request $request,$id){
        DB::transaction(function() use($request,$id){
            
            $data = Product::find($id);
            $data->name = $request->product;
            $data->category_id = $request->category_id;
            $data->brand_id = $request->brand_id;
            $data->short_desc = $request->short_title;
            $data->long_desc = $request->long_title;
            $data->price = $request->price;
            $image = $request->file('image');
            if($image){

                @unlink(public_path('upload/product_img/').$data->image);
                $imageName = time().'.'.$image->getClientOriginalName();
                $image->move(public_path('upload/product_img/'),$imageName);
                $data->image = $imageName;
            }  
            if($data->save()){
                $files = $request->sub_image;
                if(!empty($colors)){
                    ProductSubImage::where('product_id',$id)->delete();
                }
                if(!empty($files)){
                    foreach ($files as $file) {
                        
                        $imageName2 = time().'.'.$file->getClientOriginalName();
                        $file->move(public_path('upload/product_sub_img'),$imageName2);
                        $subImage = ProductSubImage();
                        $subImage->product_id = $data->id;
                        $subImage->sub_image = $imageName2;
                        $subImage->save();
                    }
                    

                }

                $colors = $request->color_id;
                if(!empty($colors)){
                    ProductColor::where('product_id',$id)->delete();
                }
                
                if(!empty($colors)){
                    foreach ($colors as $key => $color) {
                        
                        $productColor = new ProductColor();
                        $productColor->product_id = $data->id;
                        $productColor->color_id = $color;
                        $productColor->save();
                    }

                }

                $sizes = $request->size_id;
                if(!empty($sizes)){
                    ProductSize::where('product_id',$id)->delete();
                }
                if(!empty($sizes)){
                    foreach ($sizes as $key => $size) {
                        $productsize = new ProductSize();
                        $productsize->product_id = $data->id;
                        $productsize->size_id = $size;
                        $productsize->save();
                    }

                }
            } else{
                return redirect()->back()->with('success','Data not found');
            }

        });
       
       return redirect()->route('view_product')->with('success',"Product update successfully!");
    
        
    }

    public function delete($id){
        Product::find($id)->delete();
        ProductColor::where('product_id',$id)->delete();
        ProductSize::where('product_id',$id)->delete();
        ProductSubImage::where('product_id',$id)->delete();
        return redirect()->route('view_product')->with('success','Delete successfully!');

    }

    public function details($id){
        $data['details'] = Product::find($id);
        $data['colorId']=ProductColor::where('product_id',$data['details']->id)->orderBy('id','asc')->get();
        $data['sizeId']=ProductSize::where('product_id',$data['details']->id)->orderBy('id','asc')->get();
        $data['subImageId']=ProductSubImage::where('product_id',$data['details']->id)->get();
        return view('backend.admin.product.details',$data);
    }


    
}


