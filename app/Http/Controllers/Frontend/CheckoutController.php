<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\ShippingAddreses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;

class CheckoutController extends Controller
{
    public function shippingAddress()
    {
        return view('frontend.checkout.shipping_address');
    }

    public function shippingAddressStore(Request $request)
    {
        $carts = Cart::where(['user_id' => Auth::id()])->get();
        if(isset($carts[0])) {

           try {

            $shipping_address = ShippingAddreses::create([
                'user_id'       => Auth::id(),
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'post_code'     => $request->post_code,
                'city'          => $request->city,
                'country'       => $request->country,

            ]);

            $order = Order::create([
                'user_id'       => Auth::id(),
                'shipping_id'   => $shipping_address->id,
                'is_paid'       => false,
                'amount'        => 0,
                'status'        => 'Pending'
            ]);

            $amount = 0;

            foreach($carts as $cart) 
            {
                OrderItems::create([
                    'order_id'      => $order->id,
                    'seller_id'     => $cart->product->user_id,
                    'product_id'    => $cart->product_id,
                    'name'          => $cart->product->name,
                    'size'          => $cart->product->size,
                    'price'         => $cart->product->price,
                    'quantity'      => $cart->quantity,
                    'total_price'   => $cart->quantity * $cart->product->price,
                ]);
                $amount += $cart->quantity * $cart->product->price;
            }

            $order->update(['amount' => $amount]);
            Cart::where(['user_id' => Auth::id()])->delete();
            
            return redirect()->route('payment.form', $order->id);

           } catch (Exception $e) {
                return redirect()->back()->with('dismiss', $e->getMessage());
           }
        }
        return redirect()->route('home')->with('dismiss', "Thre are no products in the cart");
        
        

    }

    public function paymentForm(Request $request)
    {
        return view('frontend.checkout.stripe');
    }



    public function payStripe(Request $request)
    {
        $data = ['success' => false, 'code' => 404, 'data' => [], 'message' =>'something went wrong'];

        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);

        $order = Order::where('id', $request->order_id)->first();
        if(!$order)
        {
            $data['message'] = "Order doesn't exists or payment time expired";
            return response()->json($data);
        }

        // $secret = allSettings(['STRIPE_SECRET']);      
        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv')
                )));

            if (!isset($response['id'])) {
                return  $data;
            }
            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => allSettings('currency'),
                'amount' =>  $order->total_payable_amount * 100,
                'description' => 'order number is '.$order->order_number,
            ]);

            if($charge['status'] == 'succeeded') {

                $payment = Payment::create([
                    'user_id' =>  $order->user_id,
                    'order_id' => $request->order_id,
                    'payment_id' => $charge['id'],
                    'amount' => $charge['amount'] / 100,
                    'currency' => $charge['currency'],
                    'amount_refunded' => $charge['amount_refunded'],
                    'application_fee' => $charge['application_fee'] ? $charge['application_fee'] : 0,
                    'application_fee_amount' => $charge['application_fee_amount'] ?  $charge['application_fee_amount'] : 0,
                    'transaction_id' => $charge['balance_transaction'],
                    'payment_method' => $charge['payment_method'],
                    'payment_method_type' => isset($charge['payment_method_details']['card']) ? $charge['payment_method_details']['card']['brand'] : null,
                    'receipt_url' => $charge['receipt_url'],
                    'status' => $charge['status'],
                ]);               

                $order->update([
                    'is_paid' => true,
                    'is_order_successful' => true,
                    'payment_status' =>PAYMENT_SUCCESS,
                    'order_status' => ORDER_PROCESSING,
                    'payment_id' => $payment->id,
                    'payment_method' => 'Stripe'
                ]);

                Order_detail::where(['order_id'=>$order->id])->update(['is_order_successful'=>true]);

                app(CommonService::class)->orderInformationToUserEmail($order);
                app(CommonService::class)->orderInformationToGenxEmail($order);

                $data = ['success' => true, 'code' => 200, 'data' => [], 'message' =>'Payment Success!'];
                return  $data;

            } else {
                return  $data;
            }

        }
        catch (Exception $e) {
            // return  $data;
        }

    }
}
