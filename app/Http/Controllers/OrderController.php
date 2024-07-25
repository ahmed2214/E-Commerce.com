<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function cash(){
        $amount =0 ;
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id',$userId)->get();
        foreach ($cart as  $cartPrice) {
            $amount =  $amount +   $cartPrice->total_price;
        }
        
        $orderId = Order::create([
            'order_date'=> date('Y-m-d H:i:s'),
            'total_amount'=>$amount
        ]);
        $quantity = 0;
        // dd($cart);
        // $cart = Cart::where('user_id',$userId)->get();
        foreach ($cart as  $data) {
            $OrderItem = new OrderItem ;
            $OrderItem->total_price = $data->total_price;
            $OrderItem->quantity= $data->quantity;
            $OrderItem->user_id= $data->user_id;
            $OrderItem->product_id= $data->product_id;
            $OrderItem->order_id= $orderId->id;
            $OrderItem->save();
            $data->delete();
            $newQuantity = 0;
            $productQuantity = Product::where('id',$data->product_id)->first();
            $newQuantity = $productQuantity->quantity - $data->quantity; // incrment product quantity from stock
            $productQuantity->update([
                'quantity'=>  $newQuantity, // update stock
            ]);
           
        }
         return  redirect()->back();
    }

}
