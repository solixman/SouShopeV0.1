<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;

    protected $fillable=[
        'quantity',
        'nowPrice',
        
    ];
    
    public function product(){
        return $this->hasone(Product::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }



}
