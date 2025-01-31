<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tourNew;
use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//admin
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'getAdminDashboard'])->name('admin.dashboard');

    //district
    Route::get('/district',[DistrictController::class,'getAdminDistrict'])->name('district.index');
    Route::get('/district/create',[DistrictController::class,'getAdminDistrictCreate'])->name('district.create');
    Route::post('/district/save',[DistrictController::class,'save'])->name('district.store');
    Route::get('/district/edit/{id}',[DistrictController::class,'edit'])->name('district.edit');
    Route::post('/district/edit/{id}',[DistrictController::class,'update'])->name('district.update');
    Route::delete('/district/{id}/edit',[DistrictController::class,'delete'])->name('district.delete');

    //Hotel
    Route::get('/hotel',[HotelController::class,'index'])->name('hotel.index');
    Route::get('/hotel/create',[HotelController::class,'create'])->name('hotel.create');
    Route::post('/hotel/store',[HotelController::class,'store'])->name('hotel.store');



});

//user
Route::middleware(['auth','role:user'])->group(function () {
    Route::get('/user/dashboard',[UserController::class,'user'])->name('user.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/new', [tourNew::class, 'get'])->middleware(['auth', 'verified'])->name('new');
