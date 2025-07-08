<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use iLLUMINATE\Support\Facades\Session;
use PDO;

class CartController extends Controller
{
    public function addtoCart($id){
        $product= Product::findOrFail($id);
        $cart =session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;

        }
        
        else{
            $cart[$id]=[
                "name"=>$product->name,
                "quantity"=>1,
                "price"=>$product->price,
                "image"=>$product->image

            ];
        }
        session()->put('cart',$cart);
        return redirect()->route('cart.view')->with('success',
        'New Product added to cart');

    }
    public function viewCart(){
        return view('cart.index');
    }
    public function updateCart(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"]=$request->quantity;
            session()->put('cart',$cart);

        }
        return redirect()->route('cart.view');
    }
    public function removeFromCart($id){
        $cart=session()->get('cart');
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart',$cart);
        }
        return redirect()->route('cart.view')->with("success",'The Product has been remover from the cart');
    }
}
