<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;


class OrderHistoryController extends Controller
{
     //================OrderHistory==================//
    public function order_history()
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        $counts = 1;
        $order = Order::where('user_id', $user_id)->get();
        
        return view('user.home.order_history', compact('count', 'order', 'counts'));
    }

    //================End Method==================//

     //================OrderHistory==================//
    public function invoice($orderId) {
        $user_id = Auth::id();
        // $count = Cart::where('user_id', $user_id)->count();
        $counts = 1;
        $orderItems = Order::where('order_id', $orderId)->get();
        $order = Order::where('user_id', $user_id)->where('order_id', $orderId)->first();
        // dd($orderItems);
        
        return view('user.home.invoice', compact('orderItems', 'counts', 'order'));
    }
    //================End Method==================//

}
