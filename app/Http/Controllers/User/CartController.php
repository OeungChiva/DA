<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;


class CartController extends Controller
{
    //================AddcartPost==================//
    public function addcartPost(Request $request, $id)
    {
        if(Auth::id())
        {
            $user_id = Auth::id();
            $item_id = $id;
            $quantity = 1;
            $cart = new cart;
            $cart -> user_id = $user_id;
            $cart -> item_id = $item_id;
            $cart -> quantity = $quantity;
            $cart -> save();
            return redirect()->back();
        }
        else
        {
        return redirect('/login');
        }
    }
    //================End Method==================//
    //================Cart==================//
    public function cart()
    {
        
        if(Auth::id())
        {
            $user_id = Auth::id();
            $counts = 1;
            $count = Cart::where('user_id',$user_id)->count();
            $cart = DB::table('carts')->where('user_id',$user_id)->join('items','carts.item_id','=','items.id')
            ->select('carts.*','items.title','items.price','items.image')->orderBy('carts.id','desc')->get();
            //$cart = Cart::where('user_id', $id) ->join('items','carts.item_id','=','items.id')->get();
            return view('user.home.cart',compact('count','cart','counts'));
        }
        else
        {
        return redirect('/login');
        }
    } 
    //================End Method==================//
    //================Delete Cart==================//

    public function delete_cart($id_cart) {
        $delete = Cart::where('id', $id_cart)->first();
        $delete->delete();
        return redirect()->back()
        ->with("success","User deleted successfully!");
    }
    //================End Method==================//
    
    //================Update Cart==================//
    // public function update_cart(Request $request, $id)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Cart successfully updated!');
    //     }


    //     $cart = Cart::find($id);
    //     $cart->quantity=$request->cart_quantity;
    //     $cart->save();
    //     return redirect()->back()
    //     ->with("success","User updated successfully!");
    // }
    public function update_cart(Request $request)
{
    $cartId = $request->id;
    $quantity = $request->quantity;

    // Update the cart item with the given ID using the new quantity
    $cart = Cart::findOrFail($cartId);
    $cart->quantity = $quantity;
    $cart->save();

    // You can optionally return a response or JSON if needed
    return response()->json(['message' => 'Cart updated successfully']);
}

    //================End Method==================//

}
