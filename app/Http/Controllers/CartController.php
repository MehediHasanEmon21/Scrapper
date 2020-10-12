<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartAdd(Request $request){

    	Cart::add(['id' => $request->id, 'name' => $request->name, 'qty' => $request->qty, 'price' => $request->price, 'weight' => 550, 'options' => ['image' => $request->image]]);

    	return redirect()->route('cart.page')->with('success','Cart Product Added Successfully');

    }

    public function cartPage(){
    	return view('cart');
    }

    public function cartUpdate(Request $request){

    	Cart::update($request->rowId, $request->qty);
    	return redirect()->back()->with('success','Cart Updated Successfully');

    }

    public function cartDelete($rowId){

    	Cart::remove($rowId);
    	return redirect()->back()->with('success','Cart Remove Successfully');

    }

    public function checkout(){

        return view('checkout');
    }

    public function orderStore(Request $request){

        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->email = $request->email;
        $shipping->address = $request->address;
        $shipping->phone = $request->phone;
        $shipping->save();


        $order  = new Order();
        $order->shipping_id = $shipping->id;
        $order->customer_id = $shipping->id;
        $order->total = $request->total;
        $order->status = 0;
        $order->save();
        $contents = Cart::content();
        foreach ($contents as $key => $content) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_name = $content->name;
            $order_detail->product_image = $content->options->image;
            $order_detail->product_qty = $content->qty;
            $order_detail->product_price = $content->price;
            $order_detail->product_total_price = $content->qty*$content->price;
            $order_detail->save();
           
        }
        Cart::destroy();
        return redirect()->route('order');



    }

    public function orderPage(){
        return view('order');
    }
}
