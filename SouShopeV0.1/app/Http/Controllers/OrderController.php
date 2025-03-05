<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
 
    public function checkout(){
    $order= new Order();
    // $user=User::find(1);
    $order->user_id=1 ;
    $order->status='pending';
    $order->orderDate=now();
    $order->address_id=1;
    $order->total=0;
    
    $cart=Session::get('cart');
    foreach($cart as $cart){
        $OP=new Order_product;
        $OP->quantity=$cart['quantity'];
        $OP->priceAtMoment  =$cart['price'];
        $OP->product_id=$cart['id'];
        $OP->subtotal=$cart['price']*$cart['quantity'];
        $OP->order_id=1;
        $OP->save();
        $order->Total = $order->Total + $OP->subtotal;
    }
$order->save();
    return view('Order',compact('order'));
    }

    public function ShowMyOders(){
        $user=User::find(1);
        var_dump($user->Orders);
        
    }
    
    // public function ShowOneOrder($id){
    //     echo'here';
    //    $order= Order::find($id);
      
    //     return view('OrderPage', compact('order'));
    // }
}
