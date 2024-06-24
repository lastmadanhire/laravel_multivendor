<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\VendorController;

Route::get('/', function () {
    return view('frontend.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//admin routes
Route::middleware('auth','roles:admin')->group(function(){
    Route::get('admin/dashboard',[AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/profile',[AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('admin/profile/store',[AdminController::class, 'adminProfileStore'])->name('admin.profile.store');
    //brand group routes
    Route::controller(BrandController::class)->group(function(){
        Route::get('all/brand','allBrand')->name('all.brand');
        Route::get('add/brand','addBrand')->name('add.brand');
        Route::post('store/brand','storeBrand')->name('store.brand');
    });
});
//vendor routes
Route::middleware('auth','roles:vendor')->group(function(){
    Route::get('vendor/dashboard',[VendorController::class, 'vendorDashboard'])->name('vendor.dashboard');
});
//user routes
Route::middleware('auth','roles:user')->group(function(){
    Route::get('user/dashboard',[UserController::class, 'userDashboard'])->name('user.dashboard');
});

//logout routes
Route::get('admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
//logout routes
Route::get('admin/login',[AdminController::class,'adminLogin'])->name('admin.login');
//brand routes


require __DIR__.'/auth.php';
