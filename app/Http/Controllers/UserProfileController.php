<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index($id)
    {
        $customer=Customer::findOrFail($id);
        return view('frontend.profile.profile_master',compact('customer'));
    }
}
