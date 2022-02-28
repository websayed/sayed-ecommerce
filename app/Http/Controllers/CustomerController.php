<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();


class CustomerController extends Controller
{
    public function registration_s()
    {
        return view('frontend.pages.sigup');
    }

    public function login(Request $request){
        $email=$request->email;
        $password=$request->password;
        $result=Customer::where('email',$email)->where('password',$password)->first();
  
        if ($result){
            Session::put('id',$result->id);
            Session::put('name',$request->name);
            return Redirect::to('/');
        }
        else{
            return Redirect::to('/login-check');
        }
  
      }

    public function registration(Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['id']=$request->id;
        $data['email']=$request->email;
        $data['password']=$request->password;
        $data['mobile']=$request->mobile;
        $id=Customer::insertGetId($data);
        Session::put('id',$id);
        Session::put('customer_name',$request->name);
        return Redirect::to('login-check');
    }

    public function logout(){
        Session::flush();
        return Redirect::to('/');
        }
}
