<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradeController extends Controller
{

    /**
     * *************************** My trade ***********************************
     */
    public function myTrade()
    {
        $trades = Trade::where(['buyer_id' =>Auth::id()])->orderBy('id','desc')->simplePaginate(5);
        return view('dashboard.trade.my_trade',['trades' => $trades, 'menu' => 'trade', 'submenu' => 'my trade']);
    }

    public function details($id)
    {
        try {
            $trade = Trade::where(['id' => decrypt($id)])->with('sellerProduct','buyerProduct')->first();
            return view('dashboard.trade.my_trade_show',['trade' => $trade, 'menu' => 'trade', 'submenu' => 'my trade']);

        } catch (Exception $e) {

        }
    }

    public function myTradeReceived(Request $request)
    {
        $trade = Trade::where(['id' => $request->trade_id])->first();
        if(!empty($trade)) {
            $trade->update([
                'buyer_side_status'     => 'Completed',
                'seller_side_status'    => 'Delivered',
                'is_completed'          => 1
            ]);
            return redirect()->route('my.trade')->with('success', "Product successfully received");
        }
        return redirect()->back()->with('dismiss', "Product does not exist");
    }

    /**
     * *************************************** Trading *********************
     */
    public function trading()
    {
        $trades = Trade::where(['seller_id' =>Auth::id()])->orderBy('id','desc')->simplePaginate(5);
        return view('dashboard.trade.trading',['trades' => $trades, 'menu' => 'trade', 'submenu' => 'trading']);
    }

    public function tradingDetails($id)
    {
        try {
            $trade = Trade::where(['id' => decrypt($id)])->with('sellerProduct','buyerProduct')->first();
            return view('dashboard.trade.trading_show',['trade' => $trade, 'menu' => 'trade', 'submenu' => 'trading']);

        } catch (Exception $e) {

        }
    }

    public function tradingDecline(Request $request)
    {
        $trade = Trade::where(['id' => $request->trade_id])->first();
        if(!empty($trade)) {
            
            $trade->update([
                'buyer_side_status'     => 'Declined',
                'seller_side_status'    => 'Declined',
            ]);
            return redirect()->back()->with('success', "Product successfully declined");
        }
        return redirect()->back()->with('dismiss', "Product does not exist");
    }

    public function tradingStatusUpdate(Request $request)
    {
        $trade = Trade::where(['id' => $request->trade_id])->first();
        if(!empty($trade)) {
            
            $trade->update([
                'buyer_side_status'     => $request->status == 'accept' ? 'Processing' : 'Shipping',
                'seller_side_status'    => $request->status,
            ]);

            if($request->status == 'Shipping') {
                $trade->sellerProduct->update([
                    'quantity' => $trade->sellerProduct->quantity - 1
                ]);

                $trade->buyerProduct->update([
                    'quantity' => $trade->buyerProduct->quantity - 1
                ]);
            }
            $messege = $request->status == 'accept' ? 'accepted' : 'shipped';
            return redirect()->back()->with('success', "Product successfully ".$messege);
        }
        return redirect()->back()->with('dismiss', "Product does not exist");
    }

}