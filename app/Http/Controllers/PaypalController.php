<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Log;

class PaypalController extends Controller
{
    public function payment(Request $request)
    {
        // تحقق من وجود total
        $total = $request->input('total');
    
        // Initialize $data
        $data = [];
        $data['items'] = [
            [
                'name' => 'Order Total',
                'price' => $total , // 
                'desc' => 'Description',
                'qty' => 1
            ],
        ];
    
        // Generate a unique invoice ID
        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = 'http://127.0.0.1:8000/payment/success';
        $data['cancel_url'] = 'http://127.0.0.1:8000/cancel';
        $data['total'] = $total ; 
    
        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data, true);
    
        return redirect($response['paypal_link']);
    }
    

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        // Check for success response
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
          //  return response()->json(['message' => 'Order paid successfully']);
          return view('confirmation')->with('message', 'Order paid successfully');
  
        }

        // Log the response for troubleshooting
        Log::error('PayPal payment failed', ['response' => $response]);
        return response()->json(['error' => 'Payment failed'], 400);
       
    }

    public function cancel()
    {
        return response()->json(['message' => 'Payment canceled']);
    }
}
