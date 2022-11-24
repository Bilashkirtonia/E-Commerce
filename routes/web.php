<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Fronted\FrontedController;
use App\Http\Controllers\Fronted\OrderController;

use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\LogoController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\ColorController;
use App\Http\Controllers\backend\SizeController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\AboutUsController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CartController;
use App\Http\Controllers\backend\CheckOutController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\DashbordController;

// use App\Http\Controllers\backend\CheckOutController;
// use App\Http\Controllers\backend\CheckOutController;
// use App\Http\Controllers\backend\CheckOutController;
// use App\Http\Controllers\backend\CheckOutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/',[FrontedController::class,'index']);
Route::get('/about_us',[FrontedController::class,'about_us'])->name('about_us');
Route::get('/contact_us',[FrontedController::class,'contact_us'])->name('contact_us');
Route::get('/shopping_cart',[FrontedController::class,'shopping_cart'])->name('shopping_cart');
Route::get('/product-list',[FrontedController::class,'product_list'])->name('product_list');
Route::get('/category-product-list/{category_id}',[FrontedController::class,'category_product_list'])->name('category_product_list');
Route::get('/brand-product-list/{brand_id}',[FrontedController::class,'brand_product_list'])->name('brand_product_list');
Route::get('/product_details_show/{slug}',[FrontedController::class,'product_details_show'])->name('product_details_show');
Route::post('/message',[FrontedController::class,'message'])->name('store_message');

// CartController
Route::post('/add-to-cart',[CartController::class,'Addtocart'])->name('add_to_cart');
Route::get('/show-to-cart',[CartController::class,'Showtocart'])->name('show_to_cart');
Route::get('/delete-to-cart/{rowId}',[CartController::class,'Deletetocart'])->name('delete_to_cart');

// CheckOutController
Route::get('/customers/login',[CheckOutController::class,'customerLogin'])->name('customer_login');
Route::get('/customer/registration',[CheckOutController::class,'customerReg'])->name('customer_reg');
Route::post('/sign-up-store',[CheckOutController::class,'signup'])->name('sign-up-store');
Route::get('/verify/email/{email}',[CheckOutController::class,'varifiy'])->name('verification');
Route::post('/varify-code-update',[CheckOutController::class,'Vcode'])->name('varify_code_update');
Route::get('/check-out',[CheckOutController::class,'check_out'])->name('check_out');
Route::post('/customer-check-out',[CheckOutController::class,'customer_check_out'])->name('customer-check-out');
Route::get('/payment-method',[CheckOutController::class,'payment_method'])->name('payment_method');

Route::get('/my-order',[CheckOutController::class,'my_order'])->name('my_order');

Auth::routes();

Route::group(['middleware' => ['auth','customer']],function(){
    Route::get('/dashbord',[DashbordController::class,'login'])->name('dashbord');
    Route::get('/dashbord-edit',[DashbordController::class,'Dashbord_edit'])->name('dashbord_edit');
    Route::post('/update_dashbord',[DashbordController::class,'update_dashbord'])->name('update_dashbord');
    Route::get('/password',[DashbordController::class,'change_password'])->name('change_password');
    Route::post('/update_password',[DashbordController::class,'update_password'])->name('update_password');
    
    Route::post('/payment-store',[CheckOutController::class,'payment_store'])->name('payment_store');
    Route::get('/customer-order-details/{id}',[CheckOutController::class,'customer_order_details'])->name('customer_order_details');
    

});

Route::group(['middleware' => ['auth','admin']],function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('user')->group(function(){
        Route::get('/view',[UserController::class,'view_user'])->name('view_user');
        Route::get('/add',[UserController::class,'add_user'])->name('add_user');
        Route::post('/store',[UserController::class,'store_user'])->name('store_user');
        Route::get('/edit/{id}',[UserController::class,'edit_user'])->name('edit_user');
        Route::post('/update/{id}',[UserController::class,'update_user'])->name('update_user');
        Route::get('/delete/{id}',[UserController::class,'delete_user'])->name('delete_user');
    
    }); 



Route::prefix('user')->group(function(){
    Route::get('/view',[UserController::class,'view_user'])->name('view_user');
    Route::get('/add',[UserController::class,'add_user'])->name('add_user');
    Route::post('/store',[UserController::class,'store_user'])->name('store_user');
    Route::get('/edit/{id}',[UserController::class,'edit_user'])->name('edit_user');
    Route::post('/update/{id}',[UserController::class,'update_user'])->name('update_user');
    Route::get('/delete/{id}',[UserController::class,'delete_user'])->name('delete_user');

});

Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class,"index"])->name('profile.view');
    Route::get('/edit', [ProfileController::class,"edit"])->name('profile.edit');
    Route::post('/update', [ProfileController::class,"update"])->name('profile.update');
    Route::get('/password/view', [ProfileController::class,"password_view"])->name('profile.password_view');
    Route::post('/password/update', [ProfileController::class,"password_update"])->name('profile.password_update');
});


Route::prefix('logo')->group(function(){
    Route::get('/view',[LogoController::class,'view_logo'])->name('view_logo');
    Route::get('/add',[LogoController::class,'add_logo'])->name('add_logo');
    Route::post('/store',[LogoController::class,'store_logo'])->name('store_logo');
    Route::get('/edit/{id}',[LogoController::class,'edit_logo'])->name('edit_logo');
    Route::post('/update/{id}',[LogoController::class,'update_logo'])->name('update_logo');
    Route::get('/delete/{id}',[LogoController::class,'delete_logo'])->name('delete_logo');

});

Route::prefix('slide')->group(function(){
    Route::get('/view',[SliderController::class,'view_slide'])->name('view_slide');
    Route::get('/add',[SliderController::class,'add_slide'])->name('add_slide');
    Route::post('/store',[SliderController::class,'store_slide'])->name('store_slide');
    Route::get('/edit/{id}',[SliderController::class,'edit_slide'])->name('edit_slide');
    Route::post('/update/{id}',[SliderController::class,'update_slide'])->name('update_slide');
    Route::get('/delete/{id}',[SliderController::class,'delete_slide'])->name('delete_slide');

});

Route::prefix('contact')->group(function(){
    Route::get('/view',[ContactController::class,'view_contact'])->name('view_contact');
    Route::get('/add',[ContactController::class,'add_contact'])->name('add_contact');
    Route::post('/store',[ContactController::class,'store_contact'])->name('store_contact');
    Route::get('/edit/{id}',[ContactController::class,'edit_contact'])->name('edit_contact');
    Route::post('/update/{id}',[ContactController::class,'update_contact'])->name('update_contact');
    Route::get('/delete/{id}',[ContactController::class,'delete_contact'])->name('delete_contact');

});

Route::prefix('about')->group(function(){
    Route::get('/view',[AboutUsController::class,'view_about'])->name('view_about');
    Route::get('/add',[AboutUsController::class,'add_about'])->name('add_about');
    Route::post('/store',[AboutUsController::class,'store_about'])->name('store_about');
    Route::get('/edit/{id}',[AboutUsController::class,'edit_about'])->name('edit_about');
    Route::post('/update/{id}',[AboutUsController::class,'update_about'])->name('update_about');
    Route::get('/delete/{id}',[AboutUsController::class,'delete_about'])->name('delete_about');

});

Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class,'view_category'])->name('view_category');
    Route::get('/add',[CategoryController::class,'add_category'])->name('add_category');
    Route::post('/store',[CategoryController::class,'store_category'])->name('store_category');
    Route::get('/edit/{id}',[CategoryController::class,'edit_category'])->name('edit_category');
    Route::post('/update/{id}',[CategoryController::class,'update_category'])->name('update_category');
    Route::get('/delete/{id}',[CategoryController::class,'delete_category'])->name('delete_category');

});

Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class,'view'])->name('view_brand');
    Route::get('/add',[BrandController::class,'add'])->name('add_brand');
    Route::post('/store',[BrandController::class,'store'])->name('store_brand');
    Route::get('/edit/{id}',[BrandController::class,'edit'])->name('edit_brand');
    Route::post('/update/{id}',[BrandController::class,'update'])->name('update_brand');
    Route::get('/delete/{id}',[BrandController::class,'delete'])->name('delete_brand');

});

Route::prefix('color')->group(function(){
    Route::get('/view',[ColorController::class,'view'])->name('view_color');
    Route::get('/add',[ColorController::class,'add'])->name('add_color');
    Route::post('/store',[ColorController::class,'store'])->name('store_color');
    Route::get('/edit/{id}',[ColorController::class,'edit'])->name('edit_color');
    Route::post('/update/{id}',[ColorController::class,'update'])->name('update_color');
    Route::get('/delete/{id}',[ColorController::class,'delete'])->name('delete_color');

});

Route::prefix('color')->group(function(){
    Route::get('/view',[ColorController::class,'view'])->name('view_color');
    Route::get('/add',[ColorController::class,'add'])->name('add_color');
    Route::post('/store',[ColorController::class,'store'])->name('store_color');
    Route::get('/edit/{id}',[ColorController::class,'edit'])->name('edit_color');
    Route::post('/update/{id}',[ColorController::class,'update'])->name('update_color');
    Route::get('/delete/{id}',[ColorController::class,'delete'])->name('delete_color');

});

Route::prefix('size')->group(function(){
    Route::get('/view',[SizeController::class,'view'])->name('view_size');
    Route::get('/add',[SizeController::class,'add'])->name('add_size');
    Route::post('/store',[SizeController::class,'store'])->name('store_size');
    Route::get('/edit/{id}',[SizeController::class,'edit'])->name('edit_size');
    Route::post('/update/{id}',[SizeController::class,'update'])->name('update_size');
    Route::get('/delete/{id}',[SizeController::class,'delete'])->name('delete_size');

});


Route::prefix('product')->group(function(){
    Route::get('/view',[ProductController::class,'view'])->name('view_product');
    Route::get('/add',[ProductController::class,'add'])->name('add_product');
    Route::post('/store',[ProductController::class,'store'])->name('store_product');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit_product');
    Route::post('/update/{id}',[ProductController::class,'update'])->name('update_product');
    Route::get('/delete/{id}',[ProductController::class,'delete'])->name('delete_product');
    Route::get('/details/{id}',[ProductController::class,'details'])->name('product_details');

});

Route::prefix('customer')->group(function(){
    Route::get('/verify/view',[CustomerController::class,'V_view'])->name('verify_view');
    Route::get('/draft/view',[CustomerController::class,'D_add'])->name('draft_view');
    Route::get('/delete/{id}',[CustomerController::class,'delete'])->name('delete_customer');

});

Route::prefix('order')->group(function(){
    Route::get('/pending/view',[OrderController::class,'pending'])->name('pending_order');
    Route::get('/approve/view',[OrderController::class,'approve'])->name('approve_order');
    Route::get('/approve/product/{id}',[OrderController::class,'customer_approve_details'])->name('customer_approve_details');

});


});


