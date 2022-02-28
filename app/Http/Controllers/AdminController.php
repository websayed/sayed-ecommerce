<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\HTTP\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class AdminController extends Controller
{
    public function index(){

        return view('admin.admin_login');
    }

    public function create_admin()
    {
        return view('admin.admin_sigup');
    }

    public function admin_registration(Request $request){
        Admin::insert([
          'admin_name' => $request->name,
          'admin_email' => $request->email,
          'admin_phone' => $request->mobile,
          'admin_password' => md5($request->password),
        ]);
        
    }



    public function show_dashboard(Request $request){
        $admin_email=$request->email;
        $admin_password=md5($request->password);
        $result=Admin::where('admin_email',$admin_email)->where('admin_password', $admin_password)->first();
        if($result){
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_photo',$result->admin_photo);
            return Redirect::to('/dashboard');
        }
        else{
            Session::put('message','Email or Password Invalid');
            return Redirect::to('/admin');
        }
    }
}
