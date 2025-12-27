<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

class Package extends Model
{
    protected $fillable = [
        'hotel_id',
        'package_name',
        'status',
        'price',
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
    public function bookings(){
        return $this->HasMany(Booking::class);
    }
    public function isbooked(){
        return $this->booking()->exists();
    }
}
