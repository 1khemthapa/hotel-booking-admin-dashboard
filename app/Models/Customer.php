<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'full_name',
        'hotel_id',
        'contact',
        'email',
        'address',
        'dob'

    ];
    public function bookings(){
        return $this->hasMany(Booking::class);

    }

    public function customers(){
        return $this->belongsTo(Hotel::class,'hotel_id');
    }


}
