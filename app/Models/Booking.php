<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Package;
use App\Models\Customer;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'customer_name',
        'hotel_id',
        'package_id',
        'pax',
        'booked_date',
        'check_in_date',
        'check_out_date',
        'notes'
    ];
   public function customer(){
    return $this->belongsTo(Customer::class);

   }
   public function package(){
    return $this->belongsTo(Package::class);
   }
   public function hotel(){
    return $this->belongsTo(Hotel::class,'hotel_id');
   }
}
