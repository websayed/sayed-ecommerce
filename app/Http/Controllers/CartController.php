<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\Unit;
use App\Models\Product;
use Cart;
use DB;
use App\HTTP\Requests;
use Session;
use Illuminate\Support\facades\Redirect;
Session_start();

class CartController extends Controller
{
    public function add_to_cart_s()
    {
        return view('frontend.pages.add_cart');
    }
    public function add_to_cart(Request $request)
    {
        $quantity=$request->quantity;
        $id=$request->id;

        $products=DB::table('products')
            ->where ('id',$id)
            ->first();

        $data['quantity']=$quantity;
        $data['id']=$products->id;
        $data['name']=$products->name;
        $data['price']=$products->price;
        $data['attributes']=[$products->image];
        Cart::add($data);

        cardArray();
        return redirect()->back();

    }

    public function delete($id){
        Cart::remove($id);
        return redirect()->back();
    }
}
