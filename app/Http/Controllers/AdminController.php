<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    //admin dashboard
    public function adminDashboard(){
        return view('admin.index');
    }
    // admin logout
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    //admin login
    public function adminLogin(){
        return view('admin.admin_login');
    }
    //admin profile
    public function adminProfile(){
        //get admin
        $id=Auth::User()->id;
        $adminProfile=User::find($id);
        return view('admin.admin_profile',compact('adminProfile'));
    }
    public function adminProfileStore(Request $request){
        $id=Auth::User()->id;
        $data=User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->address=$request->address;
        if ($request->file('photo')) {
            $file=$request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data->photo=$filename;
        }
        $data->save();
        $notification=array(
            'message' =>'Admin profile updated successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
