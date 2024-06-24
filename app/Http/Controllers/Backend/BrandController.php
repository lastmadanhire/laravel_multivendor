<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //all brand
    public function allBrand(){
        $brands=Brand::latest()->get();
        return view('backend.brand.all_brand',compact('brands'));
    }
    //add brand
    public function addBrand(){
        return view('backend.brand.add_brand');

    }
    //store brand
    public function storeBrand(Request $request){
        $image=$request->file('brand_image');
        $filename=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/brand/'),$filename);
        $save_url='upload/brand/'.$filename;
        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$save_url,
            'brand_slug'=>strtolower(str_replace('-', '', $request->brand_name))

        ]);
        $notification=array(
            'message'=>'Brand updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.brand')->with($notification);

    }
}
