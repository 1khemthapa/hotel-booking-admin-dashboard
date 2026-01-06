<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Staff\BookingController;
use App\Http\Controllers\Staff\CustomerController;
use App\Http\Controllers\Staff\PackageController;
use App\Http\Controllers\Hotel\HotelownerController;
use App\Http\Controllers\Hotel\HotelRoleController;
use App\Http\Controllers\Hotel\StaffController;
use Illuminate\Support\Facades\Route;

//login route
Route::get('/stafflogin', [HotelownerController::class, 'login'])->name('hotel.login');
Route::post('/staff/login', [HotelownerController::class, 'store'])->name('owner.login');
Route::post('/staff/logout', [HotelownerController::class, 'logout'])->name('hotel.logout');


Route::prefix('staff')->middleware('auth:staffs')->group(function () {
    Route::get('/dashboard', [HotelownerController::class, 'index'])->name('staff.dashboard');

    Route::get('/packages', [PackageController::class, 'index'])->name('staffpackages.index');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('staffpackages.create');
    Route::post('/packages/store', [PackageController::class, 'store'])->name('staffpackages.store');
    Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('staffpackages.edit');
    Route::post('/packages/{id}', [PackageController::class, 'update'])->name('staffpackages.update');
    Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('staffpackages.destroy');

    Route::get('/bookings', [BookingController::class, 'index'])->name('staffbookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('staffbookings.create');
    Route::post('/bookings/store', [BookingController::class, 'store'])->name('staffbookings.store');
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('staffbookings.edit');
    Route::post('/bookings/{id}', [BookingController::class, 'update'])->name('staffbookings.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('staffbookings.destroy');

    Route::get('/customers', [CustomerController::class, 'index'])->name('staffcustomers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('staffcustomers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('staffcustomers.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('staffcustomers.edit');
    Route::post('/customers/{id}', [CustomerController::class, 'update'])->name('staffcustomers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('staffcustomers.destroy');
});
