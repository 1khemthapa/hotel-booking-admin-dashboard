<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FrontendController;
use App\Models\Hotel;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HotelController::class,'hotels'])->middleware(['auth', 'verified'])->name('dashboard');



Route::prefix('admin')->middleware(['web'])
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
        Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
        Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
        Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

        //Roles Routes
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

        //Users Routes
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


        //Hotels Routes
        Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
        Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
        Route::post('hotels/store', [HotelController::class, 'store'])->name('hotels.store');
        Route::get('/hotels/{id}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
        Route::post('/hotels/{id}', [HotelController::class, 'update'])->name('hotels.update');
        Route::delete('/hotels/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');

        
    });



require __DIR__ . '/auth.php';
require __DIR__ . '/hotel.php';
require __DIR__ . '/staff.php';
