<?php

use App\Http\Controllers\Hotel\HotelBookingController;
use App\Http\Controllers\Hotel\HotelCustomerController;
use App\Http\Controllers\Hotel\HotelPackageController;
use App\Http\Controllers\Hotel\HotelownerController;
use App\Http\Controllers\Hotel\StaffController;
use Illuminate\Support\Facades\Route;

//login route
Route::get('/ownerlogin', [HotelownerController::class,'login'])->name('hotel.login');
Route::post('/owner/login', [HotelownerController::class,'store'])->name('owner.login');
    Route::get('/owner/loggedin',[HotelownerController::class,'show'])->name('owner.show');
    Route::post('/owner/logout',[HotelownerController::class,'logout'])->name('hotel.logout');

Route::prefix('owner')->middleware('auth:hotels')->group(function () {


     Route::get('/packages',[HotelPackageController::class,'index'])->name('hotelpackages.index');
        Route::get('/packages/create',[HotelPackageController::class,'create'])->name('hotelpackages.create');
        Route::post('/packages/store',[HotelPackageController::class,'store'])->name('hotelpackages.store');
        Route::get('/packages/{id}/edit',[HotelPackageController::class,'edit'])->name('hotelpackages.edit');
        Route::post('/packages/{id}',[HotelPackageController::class,'update'])->name('hotelpackages.update');
        Route::delete('/packages/{id}',[HotelPackageController::class,'destroy'])->name('hotelpackages.destroy');

          Route::get('/bookings', [HotelBookingController::class, 'index'])->name('hotelbookings.index');
        Route::get('/bookings/create', [HotelBookingController::class, 'create'])->name('hotelbookings.create');
        Route::post('/bookings/store', [HotelBookingController::class, 'store'])->name('hotelbookings.store');
        Route::get('/bookings/{id}/edit', [HotelBookingController::class, 'edit'])->name('hotelbookings.edit');
        Route::post('/bookings/{id}', [HotelBookingController::class, 'update'])->name('hotelbookings.update');
        Route::delete('/bookings/{id}', [HotelBookingController::class, 'destroy'])->name('hotelbookings.destroy');

          Route::get('/customers', [HotelCustomerController::class, 'index'])->name('hotelcustomers.index');
        Route::get('/customers/create', [HotelCustomerController::class, 'create'])->name('hotelcustomers.create');
        Route::post('/customers/store', [HotelCustomerController::class, 'store'])->name('hotelcustomers.store');
        Route::get('/customers/{id}/edit', [HotelCustomerController::class, 'edit'])->name('hotelcustomers.edit');
        Route::post('/customers/{id}', [HotelCustomerController::class, 'update'])->name('hotelcustomers.update');
        Route::delete('/customers/{id}', [HotelCustomerController::class, 'destroy'])->name('hotelcustomers.destroy');
        
          Route::get('/staffs', [StaffController::class, 'index'])->name('hotelstaffs.index');
        Route::get('/staffs/create', [StaffController::class, 'create'])->name('hotelstaffs.create');
        Route::post('/staffs/store', [StaffController::class, 'store'])->name('hotelstaffs.store');
        Route::get('/staffs/{id}/edit', [StaffController::class, 'edit'])->name('hotelstaffs.edit');
        Route::post('/staffs/{id}', [StaffController::class, 'update'])->name('hotelstaffs.update');
        Route::delete('/staffs/{id}', [StaffController::class, 'destroy'])->name('hotelstaffs.destroy');


});
