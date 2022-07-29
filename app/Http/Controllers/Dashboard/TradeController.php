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
     * My trade
     */
    public function myTrade()
    {
        $trades = Trade::where(['buyer_id' =>Auth::id()])->simplePaginate(5);
        return view('dashboard.trade.my_trade',['trades' => $trades, 'menu' => 'trade', 'submenu' => 'my trade']);
    }

    public function details($id)
    {
        try {
            $trade = Trade::where(['id' => decrypt($id)])->first();
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
        return redirect()->back()->with('dismiss', "Product doesn't exists");
    }
}
