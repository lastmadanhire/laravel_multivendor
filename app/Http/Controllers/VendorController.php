<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    //vendor dashboard
    public function vendorDashboard(){
        return view('vendor.vendor_dashboard');
    }
}
