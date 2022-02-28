<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Slider;





class HomeController extends Controller
{

    public function allshop()
    {
        $categories = Category::latest()->get();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $sliders = Slider::all();
        $customer = Customer::all();
        $order = Order::all();
        $products = Product::where('status', 1)->latest()->limit(12)->get();
        return view('frontend.pages.all_shop', compact('categories', 'brands', 'units', 'sizes', 'sliders', 'products', 'customer', 'order'));

    }
    public function index()
    {
        $categories = Category::latest()->get();
        // $brands = Brand::all();
        // $units = Unit::all();
        // $sizes = Size::all();
        // $sliders = Slider::all();
        // $customer = Customer::all();
        // $order = Order::all();
        $products = Product::where('status', 1)->latest()->limit(12)->get();
        return view('frontend.index',compact('categories','products'));
    }

    public function view_details($id)
    {
        $categories = Category::latest()->get();
        $brands = Brand::all();
        $product = Product::findOrFail($id);
        $size = Size::find($product->size_id);
        $cat_id = $product->cat_id;
        $related_products = Product::where('cat_id', $cat_id)->limit(4)->get();
        return view('frontend.pages.view_details', compact('categories', 'brands', 'size', 'product', 'related_products'));
    }

    public function product_by_cat($id)
    {
        $categories = Category::latest()->get();
        $brands = Brand::all();
        $products = Product::where('status', 1)->where('cat_id', $id)->limit(12)->get();
        return view('frontend.pages.product_by_cat', compact('categories', 'brands', 'products'));
    }

    public function product_by_brn($id)
    {
        $categories = Category::latest()->get();
        $brands = Brand::all();
        $products = Product::where('status', 1)->where('br_id', $id)->limit(12)->get();
        return view('frontend.pages.product_by_brn', compact('categories', 'brands', 'products'));
    }

   
}
