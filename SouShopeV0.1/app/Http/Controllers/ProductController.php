<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Session;

use function Termwind\render;

class ProductController extends Controller
{
    public function ShowProductsforAdmin()
    {
        $user = User::find(1);
        if ($user->HasPermissionto('admin')) {
            $Products = Product::get();
            return view('AdminDashoard', compact('Products'));
        } {
            return view('403Page');
        }
    }

    public function ShowProductsforClient()
    {
        $Products = Product::get();

        return view('ClientDashboard', compact('Products'));
    }

    public function ShowProductDetails(Request $request)
    {
        $Product = Product::find($request['id']);

        return view('Product', compact('Product'));
    }

    public function ShowOneProduct(Request $request)
    {
        $Product = Product::find($request['id']);
        return view('UpdateFrom', compact('Product'));
    }

    public function CreateProduct(Request $request)
    {
        $Product = new Product();
        // dd($request['sous_categorie_id']);
        $Product->titre = $request['titre'];
        $Product->image = $request['image'];
        $Product->price = $request['price'];
        $Product->type = $request['type'];
        $Product->quantity = $request['quantity'];
        $Product->description = $request['description'];
        $Product->sous_categorie_id = $request['sous_categorie_id'];
        $Product->admin_id = 1;

        $Product->save();
        return back();
    }
    public function deleteProduct(Request $request)
    {
        $Product = Product::find($request['id']);

        if ($Product) {
            $Product->delete();
        }
        return back();
    }

    public function showUpdateForm(Request $request)
    {

        $Product = Product::find($request['id']);

        return view('UpdateForm', compact('Product'));
    }

    public function updateProduct(Request $request)
    {
        $Product = Product::find($request['id']);
        $Product->titre = $request['titre'];
        $Product->image = $request['image'];
        $Product->price = $request['price'];
        $Product->type = $request['type'];
        $Product->sous_categorie_id = $request['sous_categorie_id'];
        $Product->quantity = $request['quantity'];
        $Product->description = $request['description'];
        $Product->save();
        return redirect('/admin/Product');
    }



    public function AddProductToSession(Request $request)
    // {
    //     $index = 0;
    //     // dd($request['ProductId']);
    //     $Product = $request['ProductId'];
    //     $Quantity = $request['quantity'];
       
    //     $cart = session()->get('Q&P');
    //     // dd($cart);
    //     foreach ($cart as $key => $value) {

    //         if (isset($value[$Product])) {
    //         //  dd('here');
    //         var_dump( $value[$Product]);
    //         $value[$Product] = $value[$Product] + $Quantity;
    //         var_dump( $value[$Product]);
    //             // die();
    //             $index = 1;

    //             Session::put('Q&P',$cart);
    //         }
            

    //     }
    //     if($index == 0){
    //       $SessionArray = [$Product => $Quantity];
    //       // dd($SessionArray);
    //     Session::forget('Q&P');
    //     Session::push('Q&P', $SessionArray);
    //     // die;
    //     }

        
    //     return redirect('/client/Product');
    // }


    // public function addToCart($id)

    {
        // Session::forget('cart');
        $id = $request['ProductId'];
        $product = Product::find($id);

          

        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->titre,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return  redirect('/client/Product')->with('success', 'Product added to cart successfully!');
    }




    public function ProductsTocart()
    {
        // echo 'here';
        // $Products = [];
        // $totalprice = 0;
        // $SessionData = Session::get('cart');
        // dd($SessionData);
        // foreach ($SessionData as $product) {
        //      dd($product);
        //     foreach ($product as $key => $value) {

        //         $product = Product::find($key);
        //         $product->quantity = $value;
        //         array_push($Products, $product);
        //         $totalprice = $totalprice + $product->price * $value;
        //     }
        // }
        // $Products;
        return view('Cart');
    }

    public function RemoveFromCart(Request $request) {
        
    
            if($request->id) {
    
                $cart = session()->get('cart');
    
                if(isset($cart[$request->id])) {
    
                    unset($cart[$request->id]);
    
                    session()->put('cart', $cart);
    
                }
    
                session()->flash('success', 'Product removed successfully');
    
            }
    
        return back();
    }
}
