<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;


class OrderController extends Controller
{
     //==================Show All Menu=======================//
    public function order() {
        
        $count = 1;
        $orders = Order::with('orderItems')->get();
        $orderStatuses = ['Order Received', 'In-Progress', 'Shipped', 'Delivered', 'Completed'];
        return view('admin.home.order.list_order',compact('count','orders','orderStatuses'));
    }

    public function updateOrderStatus(Request $request)
    {
        $orderId = $request->input('orderId');
        $status = $request->input('status');
    
        // Find the order by ID
        $order = Order::find($orderId);
    
        if ($order) {
            // Update the delivery status
            $order->delivery_status = $status;
            $order->save();
    
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false, 'message' => 'Order not found']);
    }







     //==================Show All Menu=======================//
    public function create_order() {

        return view('admin.home.order.create_order');
    }


    //==================Delete Menu=======================//
    // public function delete_order($id_order) {
    //     $delete = Order::where('id', $id_order)->first();
    //     $delete->delete();
    //     return redirect('/admin/order')
    //     ->with("success","Order deleted successfully!");
    // }
    public function delete_order($id_order) {
        $order = Order::find($id_order);
    
        if ($order) {
            // Delete associated order items
            $order->orderItems()->delete();
    
            // Delete the order itself
            $order->delete();
    
            return redirect('/admin/order')->with("success", "Order deleted successfully!");
        }
    
        return redirect('/admin/order')->with("error", "Order not found.");
    }

    // public function invoice() {
    //     return view('admin.home.order.invoice');
    // }    
    public function invoice($orderId)
{
    $order = Order::with('orderItems')->find($orderId);

    return view('admin.home.order.invoice', compact('order'));
}

}
