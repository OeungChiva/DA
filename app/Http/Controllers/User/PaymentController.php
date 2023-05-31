<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Exception\CardException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;


use App\Models\Cart;
use App\Models\Order;
use App\Models\User;

use App\Models\Item;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;



class PaymentController extends Controller
{
    //================AddcartPost==================//

    // public function cashPost(Request $request)
    // {
    //     $user = Auth::user();
    //     $user_id = Auth::id();
    //     $count = Cart::where('user_id',$user_id)->count();
    //     $userid = Auth::user()->id;
    //     // Retrieve data from the form
    //     $order_name = $request->input('order_name');
    //     $order_phone = $request->input('order_phone');
    //     $order_email = $request->input('order_email');
    //     $order_address = $request->input('order_address');
    //     // Get cart items
    //     $cartItems = Cart::where('user_id', $userid)->get();
    //     foreach ($cartItems as $cartItem) {
    //         $order = new Order;
    //         $order->name = $order_name;
    //         $order->email = $order_email;
    //         $order->phone = $order_phone;
    //         $order->address = $order_address;
    //         $order->user_id = $userid;
    //         // Get item data from the cart
    //         $item = Item::find($cartItem->item_id);
    //         $order->item_title = $item->title;
    //         $order->price = $item->price * $cartItem->quantity;
    //         $order->image = $item->image;
    //         $order->item_id = $item->id;
    //         $order->quantity = $cartItem->quantity;
    //         $order->payment_status = 'cash on delivery';
    //         $order->delivery_status = 'processing';
    //         $order->save();
    //         $cartItem->delete();
    //     }
    //      // Get the order data for the payment summary
    //     $orderData = Order::where('user_id', $userid)->latest()->first();
    //     return view('user.home.payment.payment_summary',compact('count','orderData','user'));
        
    // }
    //================AddcartPost==================//

    public function checkout()
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        $cartItems = Cart::where('user_id', $user_id)->get();
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $item = Item::find($cartItem->item_id);
            // Calculate the total price for each item by multiplying the item's price with the quantity in the cart
            $itemTotalPrice = $item->price * $cartItem->quantity;
            $totalPrice += $itemTotalPrice;
        }
        return view('user.home.checkout',compact('count','totalPrice'));
    }


    public function checkoutPost(Request $request)
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        $cartItems = Cart::where('user_id', $user_id)->get();
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $item = Item::find($cartItem->item_id);
            // Calculate the total price for each item by multiplying the item's price with the quantity in the cart
            $itemTotalPrice = $item->price * $cartItem->quantity;
            $totalPrice += $itemTotalPrice;
        }

        $paymentMethod = $request->input('payment_method');

        if ($paymentMethod === 'card_payment') {
            $user = Auth::user();
            $count = Cart::where('user_id', $user_id)->count();
            $userid = Auth::user()->id;

            // Retrieve data from the form
            $order_name = $request->input('order_name');
            $order_phone = $request->input('order_phone');
            $order_email = $request->input('order_email');
            $order_address = $request->input('order_address');

            // Get cart items
            $cartItems = Cart::where('user_id', $userid)->get();
            // Generate the order_id for the entire order
            $order_id = now()->format('YmdHis') . Str::random(4);
            foreach ($cartItems as $cartItem) {
                $order = new Order;
                $order->name = $order_name;
                $order->email = $order_email;
                $order->phone = $order_phone;
                $order->address = $order_address;
                $order->user_id = $userid;

                // Get item data from the cart
                $item = Item::find($cartItem->item_id);
                $order->item_title = $item->title;
                $order->price = $item->price * $cartItem->quantity;
                $order->image = $item->image;
                $order->item_id = $item->id;
                $order->quantity = $cartItem->quantity;
                $order->payment_status = 'paid';
                $order->delivery_status = 'processing';
                // Generate and assign the order_id
                $order->order_id = $order_id;
                $order->save();

                // $cartItem->delete();
            }

            return redirect('/card');
        } else {
            $paymentStatus = 'cash on delivery';

            $user = Auth::user();
            $count = Cart::where('user_id', $user_id)->count();
            $userid = Auth::user()->id;

            // Retrieve data from the form
            $order_name = $request->input('order_name');
            $order_phone = $request->input('order_phone');
            $order_email = $request->input('order_email');
            $order_address = $request->input('order_address');

            // Get cart items
            $cartItems = Cart::where('user_id', $userid)->get();
            // Generate the order_id for the entire order
            $order_id = now()->format('YmdHis') . Str::random(4);
            foreach ($cartItems as $cartItem) {
                $order = new Order;
                $order->name = $order_name;
                $order->email = $order_email;
                $order->phone = $order_phone;
                $order->address = $order_address;
                $order->user_id = $userid;
                // Get item data from the cart
                $item = Item::find($cartItem->item_id);
                $order->item_title = $item->title;
                $order->price = $item->price * $cartItem->quantity;
                $order->image = $item->image;
                $order->item_id = $item->id;
                $order->quantity = $cartItem->quantity;
                $order->payment_status = $paymentStatus;
                $order->delivery_status = 'processing';
                // Generate and assign the order_id
                $order->order_id = $order_id;
                $order->save();
                $cartItem->delete();
                Alert::success('Order successful!','Thanks for your order!');
            }
           // $orderData = Order::where('user_id', $userid)->latest()->first();
           // return view('user.home.payment.payment_summary',compact('count','orderData','user'));
            return redirect()->back();
            //return back()->with('success', 'Payment successful!')->with('alert', 'success');
        }
    }



    //================AddcartPost==================//



    public function card(Request $request)
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        $cartItems = Cart::where('user_id', $user_id)->get();
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $item = Item::find($cartItem->item_id);
            // Calculate the total price for each item by multiplying the item's price with the quantity in the cart
            $itemTotalPrice = $item->price * $cartItem->quantity;
            $totalPrice += $itemTotalPrice;
        }
        return view('user.home.payment.card', compact('count', 'totalPrice'));
    }

    //================AddcartPost==================//
    public function cardPost(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $cartItems = Cart::where('user_id', $user_id)->get();
            $totalPrice = 0;
            foreach ($cartItems as $cartItem) {
                $item = Item::find($cartItem->item_id);
                // Calculate the total price for each item by multiplying the item's price with the quantity in the cart
                $itemTotalPrice = $item->price * $cartItem->quantity;
                $totalPrice += $itemTotalPrice;
            }
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            \Stripe\Charge::create([
                "amount" => $totalPrice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment!"
            ]);
        $user = Auth::user();
        $count = Cart::where('user_id',$user_id)->count();
        $userid = Auth::user()->id;
        // Get cart items
        $cartItems = Cart::where('user_id', $userid)->get();
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }
        return back()->with('success', 'Payment successful!');
    }

    









}
