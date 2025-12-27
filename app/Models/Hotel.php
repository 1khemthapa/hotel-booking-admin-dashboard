<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Important to extend this
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Guard;

class Hotel extends Authenticatable
{
    protected $guard='hotels';
    protected $fillable = [
        'type',
        'name',
        'contact',
        'address',
        'email',
        'username',
        'password',
        'status',
        'remarks'
    ];
    public function bookings(){
        return $this->hasMany(Booking::class,'hotel_id');

    }
    public function packages(){
        return $this->hasMany(Package::class,'hotel_id');
    }
    public function owners(){
        return $this->belongsTo(User::class,'owner_id');
    }
    public function customers(){
        return $this->hasMany(Customer::class,'hotel_id');
    }
    public function staffs(){
        return $this->hasMany(Staff::class,'hotel_id');
    }
}
