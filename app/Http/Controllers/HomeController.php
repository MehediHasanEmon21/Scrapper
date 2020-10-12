<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $orders = Order::orderBy('id','DESC')->get();
        return view('home',compact('orders'));
    }

    public function detail($id){

        $orders = OrderDetail::orderBy('id','DESC')->where('order_id',$id)->get();
        $order_shipping_info = Order::with(['shipping'])->where('id',$id)->first();
        return view('order_detail',compact('orders','order_shipping_info'));



    }
}
