<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'status'
    ];
    
    public function Client(){
        return $this->hasone(User::class);
    }
    public function Order_product(){
        return $this->hasmany(Order_product::class);
    }
    public function Adress(){
        return $this->hasone(Addres::class);
    }
}
