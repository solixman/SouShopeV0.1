<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\Order_Product;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'orderDate',
        'status'
    ];
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Order_products(){
        return $this->hasmany(Order_product::class);
    }
    public function Address(){
        return $this->hasone(Address::class);
    }
}
