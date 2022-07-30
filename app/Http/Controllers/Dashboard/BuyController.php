<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Buy;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{

    /**
     * *************************** My buy ***********************************
     */
    public function myOrder()
    {
        $orders = Buy::where(['buyer_id' =>Auth::id()])->orderBy('id','desc')->simplePaginate(5);
        return view('dashboard.buy.my_order',['orders' => $orders, 'menu' => 'order', 'submenu' => 'my order']);
    }

    public function myOrderDetails($id)
    {
        try {
            $order = Buy::where(['id' => decrypt($id)])->first();
            return view('dashboard.buy.my_order_show',['order' => $order, 'menu' => 'order', 'submenu' => 'my order']);

        } catch (Exception $e) {

        }
    }

    public function myOrderReceived(Request $request)
    {
        $buy = Buy::where(['id' => $request->order_id])->first();
        if(!empty($buy)) {
            $buy->update([
                'buyer_side_status'     => 'Completed',
                'seller_side_status'    => 'Delivered',
                'is_completed'          => 1
            ]);
            return redirect()->route('my.order')->with('success', "Product successfully received");
        }
        return redirect()->back()->with('dismiss', "Product doesn't exists");
    }

    /**
     * *************************************** orders *********************
     */
    public function orders()
    {
        $orders = Buy::where(['seller_id' =>Auth::id()])->orderBy('id','desc')->simplePaginate(5);
        return view('dashboard.buy.orders',['orders' => $orders, 'menu' => 'order', 'submenu' => 'orders']);
    }

    public function ordersDetails($id)
    {
        try {
            $order = Buy::where(['id' => decrypt($id)])->first();
            return view('dashboard.buy.orders_show',['order' => $order, 'menu' => 'order', 'submenu' => 'orders']);

        } catch (Exception $e) {

        }
    }

    public function orderStatusUpdate(Request $request)
    {
        $buy = Buy::where(['id' => $request->order_id])->first();
        if(!empty($buy)) {
            
            $buy->update([
                'buyer_side_status'     => $request->status == 'accept' ? 'Processing' : 'Shipping',
                'seller_side_status'    => $request->status,
            ]);

            if($request->status == 'Shipping') {
                $buy->product->update([
                    'quantity' => $buy->product->quantity - 1
                ]);
            }
            return redirect()->back()->with('success', "Product successfully ".$request->status);
        }
        return redirect()->back()->with('dismiss', "Product doesn't exists");
    }

}