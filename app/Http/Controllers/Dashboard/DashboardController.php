<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['my_trade'] = Trade::where(['buyer_id' => Auth::id()])->count();
        $data['trading'] = Trade::where(['seller_id' => Auth::id()])->count();
        $data['recent_trades'] = Trade::where(['seller_id' => Auth::id(), 'seller_side_status' => 'Requested'])->limit(5)->get();
       
        return view('dashboard.index',['data' => $data,'menu' => 'dashboard']);
    }
}
