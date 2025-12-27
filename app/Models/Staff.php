<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'hotel_id',
        'contact',
        'password'
    ];
    protected $hidden = ['password'];

    public function hotel(){
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
}
