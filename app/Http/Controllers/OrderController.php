<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.list', compact('orders')); 
    }

 // تابع قبول الطلب
 public function acceptOrder($id)
 {
     // البحث عن الطلب باستخدام المعرف (ID)
     $order = Order::find($id);
     if ($order) {
         // تحديث حالة الطلب إلى مقبول
         $order->status = 'accepted';
         $order->save();

         return redirect()->back()->with('success', 'The order has been accepted successfully.');
     } else {
         return redirect()->back()->with('error', 'Order not found.');
     }
 }

 public function denyOrder($id)
 {
     // البحث عن الطلب باستخدام المعرف (ID)
     $order = Order::find($id);
 
     if ($order) {
         // حذف الطلب
         $order->delete();
 
         return redirect()->back()->with('success', 'The order has been deleted successfully.');
     } else {
         return redirect()->back()->with('error', 'Order not found.');
     }
 }
 
}
