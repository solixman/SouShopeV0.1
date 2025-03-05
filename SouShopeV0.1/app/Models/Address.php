<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'region',
        'city',
        'street',
        'neighbrhood',
        'zipCode',
    ];

    public function Users(){
        return $this->belongsToMany(User::class);
    }

    public function Orders(){
        return $this->belongsToMany(Order::class);
    }
    
}
