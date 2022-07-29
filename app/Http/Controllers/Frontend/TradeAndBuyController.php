<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradeAndBuyController extends Controller
{
    public function trade(Request $request)
    {
        try {
            Trade::create([
                'buyer_id'      => Auth::id(),
                'product_id'    => $request->product_id,
                'seller_id'     => 1,
                'contact_method'=> $request->contact_method,
                'contact_info'  => $request->contact_info,
                'buyer_side_status' => 'Pending',
                'seller_side_status' => 'Requested'   
            ]);

            return redirect()->route('home')->with('success', "Requeset sent to the seller" );

        } catch (Exception $e) {
            return redirect()->back()->with('dismiss', $e->getMessage() );
        }
    }

    public function buy(Request $request)
    {
        dd('buy');
    }
}
