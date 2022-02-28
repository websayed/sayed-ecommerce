<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

// show admin
Route::get('/admin',[AdminController::class,'index']);
Route::post('/admin-dashboard',[AdminController::class,'show_dashboard']);
Route::get('/create-admin',[AdminController::class,'create_admin']);
Route::post('/admin-registration',[AdminController::class,'admin_registration']);
Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
Route::get('/logout',[SuperAdminController::class,'logout']);



//Category Routes here........
Route::resource('/categories',CategoryController::class);
Route::get('/category-status{category}',[CategoryController::class,'change_status']);
Route::get('delete/category{catygory}',[CategoryController::class,'delete_category']);


//Sub Slider Routes here........
Route::resource('/sliders',SliderController::class);
Route::get('/slider-status{slider}',[SliderController::class,'change_status']);

//Brand Routes here........
Route::resource('/brands',BrandController::class);
Route::get('/brand-status{brand}',[BrandController::class,'change_status']);

//Units Routes here........
Route::resource('/units',UnitController::class);
Route::get('/unit-status{unit}',[UnitController::class,'change_status']);


//Sizes Routes here........
Route::resource('/sizes',SizeController::class);
Route::get('/size-status{size}',[SizeController::class,'change_status']);

//contuct routes ====================
Route::get('/contact-show',[ContactController::class,'contact_show']);
Route::get('/contact-create',[ContactController::class,'contact_create']);
Route::post('/contact',[ContactController::class,'contact']);

// //Colors Routes here........
// Route::resource('/colors',ColorController::class);
// Route::get('/color-status{color}',[ColorController::class,'change_status']);

//Products Routes here........
Route::resource('/products',ProductController::class);
Route::get('/product-status{product}',[ProductController::class,'change_status']);

//Order reletad route===========
Route::get('/manage-order',[OrderController::class,'manage_order']);
Route::get('/view-order/{id}',[OrderController::class,'view_order']);




// // Frontend route....
Route::get('/',[HomeController::class,'index']);
Route::get('/view_product/{id}',[HomeController::class,'view_details']);
Route::get('/product_by_cat/{id}',[HomeController::class,'product_by_cat']);
Route::get('/product_by_brn/{id}',[HomeController::class,'product_by_brn']);
Route::get('/allshop',[HomeController::class,'allshop']);


// //Add to cart route

Route::post('/add-to-cart', [CartController::class,'add_to_cart']);
Route::get('/add-to-cart-s', [CartController::class,'add_to_cart_s']);
Route::get('/delete-cart/{id}', [CartController::class,'delete']);

// //checkout route
Route::get('/checkout', [CheckoutController::class,'index']);
Route::get('/login-check', [CheckoutController::class,'login_check']);

//customer login,reg,logout route here...
Route::post('/customer-login', [CustomerController::class,'login']);
Route::get('/customer-registration-s', [CustomerController::class,'registration_s']);
Route::post('/customer-registration', [CustomerController::class,'registration']);
Route::get('/cus-logout', [CustomerController::class,'logout']);
Route::post('/save-shipping-address', [CheckoutController::class,'save_shipping_address']);
Route::get('/payment', [CheckoutController::class,'payment']);
Route::post('/order-place', [CheckoutController::class,'order_place']);

//user profile========================
Route::get('/user-profile/{id}',[UserProfileController::class,'index']);
Route::post('/userprofle-place', [CheckoutController::class,'profile_place']);