<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Traits\HasRoles;

class Staff extends Authenticatable
{
    use HasRoles;
    protected $guard_name='staffs';
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
