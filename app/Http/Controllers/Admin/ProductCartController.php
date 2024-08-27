<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartOrder;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
     public function pendingorder(){
   $orders=CartOrder::where('order_status','Pending')->orderBy('id','DESC')->get();
   return view('backend.orders.pending_orders',compact('orders'));
}
     public function processingorder(){
         $orders=CartOrder::where('order_status','Processing')->orderBy('id','DESC')->get();
         return view('backend.orders.processing_orders',compact('orders'));
}
     public function complateorder(){
         $orders=CartOrder::where('order_status','Complete')->orderBy('id','DESC')->get();
         return view('backend.orders.complate_orders',compact('orders'));
}
    public function orderdetails($id){
        $order=CartOrder::findOrFail($id);
        return view('backend.orders.order_details',compact('order'));

    }
    public function pendingtoprocessing($id){

        CartOrder::findOrFail($id)->update(['order_status' => 'Processing']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pending.order')->with($notification);

    }
    public function processingtocomplete($id){

        CartOrder::findOrFail($id)->update(['order_status' => 'Complete']);

        $notification = array(
            'message' => 'Order Complete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('processing.order')->with($notification);

    }
    public function orderdelete($id){
         CartOrder::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Order deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }
}
