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
    $user=User::find(1);
    $order->user_id=$user->id ;
    $order->status='pending';
    $order->orderDate=now();
    $order->address_id=1;
    $order->total=0;
    $order->save();
    $cart=Session::get('cart');

    foreach($cart as $cart){
        $OP=new Order_product;
        $OP->quantity=$cart['quantity'];
        $OP->priceAtMoment  =$cart['price'];
        $OP->product_id=$cart['id'];
        $OP->subtotal=$cart['price']*$cart['quantity'];
        $OP->order_id=$order->id;
        $OP->save();
        // dd($OP->product);
        $order->Total = $order->Total + $OP->subtotal;
    }
    // $order->save();
    return view('Order',compact('order'));
    }

    public function ShowMyOders(){
        $user=User::find(1);
        var_dump($user->Orders);
        
    }


    public function ProcessOrder(Request $request){
  
        $order = Order::find($request['order_id']);
    return view('Payement', compact('order'));
    }




    public function ShowAllorders(){
      $orders=Order::with('User')->get();
    //   dd($orders);
      return view('AdminOrders',compact('orders'));
    }

    public function ShowAllordersClient(){
       $user=User::find(1);
        $orders=Order::where('user_id',$user->id)->get();
        return view('ClientOrders',compact('orders'));
    }

    public function cancelOrder($id)
{   
    $order = Order::findOrFail($id);

    if($order->status == 'completed'){
      
        return back()->with('error','Order already completed');
        
    }else if($order->status != 'completed'){
        
    $order->status = 'cancelled';
    $order->save();
    return redirect()->back()->with('success', 'Order cancelled successfully.');
    }
}

public function updateOrderStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->input('status');
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}
    
    // public function ShowOneOrder($id){
    //     echo'here';
    //    $order= Order::find($id);
      
    //     return view('OrderPage', compact('order'));
    // }
}
