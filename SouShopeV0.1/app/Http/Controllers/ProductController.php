<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function ShowProductsforAdmin(){
        $Products = Product::get();
        
        return view('AdminDashoard',compact('Products'));
    }

    public function ShowProductsforClient(){
        $Products = Product::get();
        
        return view('ClientDashboard',compact('Products'));
    }
    
    public function ShowProductDetails(Request $request){
        $Product = Product::find($request['id']);
        
        return view('Product',compact('product'));
    }

    public function ShowOneProduct(Request $request){
        $Product = Product::find($request['id']);
        return view('UpdateFrom',compact('Product'));
        }
        
       public function CreateProduct(Request $request){
        $Product = new Product();
        $Product->titre = $request['titre'];
        $Product->image= $request['image'];
        $Product->price=$request['price'];
        $Product->type=$request['type'];
        $Product->quantity=$request['quantity'];
        $Product->description= $request['description'];
        $Product->sous_categorie_id=$request['sous_categorie_id'];
    
        $Product->save();
        return back();
    
    }
    public function deleteProduct(Request $request){
        $Product = Product::find($request['id']);
    
        if($Product){
            $Product->delete();
        }
        return back();

}
}