<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function showCart(){
      $user_id = Auth::user()->id;
      
      $cart = Cart::where('user_id',$user_id)->with(['Product','User'])->get();
  
      return view('cart.index', compact('cart'));
    }
    public function addToCart ($id,Request $request ){
      if(Auth::id()){
        $user =Auth::user();
        $product = Product::find($id);
        $quantity = $request->quantity;
        $total_price = $quantity *   $product->price ;
        $cart = new Cart ;
         $cart->total_price = $total_price ;
         $cart->quantity = $quantity ;
         $cart->user_id = $user->id ;
         $cart->product_id =$product->id ;
         $cart->save();
          return redirect()->back();
      }else{
        return redirect()->route('auth.showloginform');
      }


    }
}
