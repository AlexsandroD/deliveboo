<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Order;
use Illuminate\Validation\ValidationRuleParser;
use App\Mail\NewOrderMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function token(Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        return response()->json($token);
    }

    public function payment(Request $request, Gateway $gateway){
        $data = $request->all();

        // validazione dati ricevuti
        $validator = Validator::make($data, [
            'name' => 'required|string|max:80',
            'surname' => 'required|string|max:80',
            'email' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'comment' => 'nullable|string|max:150',
            'restaurantId' => 'required|exists:restaurants,id',
            'totalPrice' => 'required|numeric|max:9999',
        ]);

        
        
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors()
            ], 400);
        }

        
        
        
        $payment = $gateway->transaction()->sale([
            "amount" => $data["totalPrice"],
            "paymentMethodNonce"=>$data["nonce"],
            "options"=>[
                "submitForSettlement"=> true
            ],
        ]);
        
        if($payment->success){

            $newOrder = new Order;
            $newOrder->customer_name = $data['name'];
            $newOrder->customer_surname = $data['surname'];
            $newOrder->customer_email = $data['email'];
            $newOrder->customer_address = $data['address'];
            $newOrder->customer_city = 'Roma';
            $newOrder->customer_country = 'Italia';
            $newOrder->customer_post_code = '00100';
            $newOrder->customer_phone = $data['phone'];
            if(isset($data['comment'])) {
                $newOrder->customer_comment = $data['comment'];
            }
            $newOrder->accepted = false;
            $newOrder->tot_price = $data['totalPrice'];
            $newOrder->payment_token = $data['token'];
            $newOrder->restaurant_id = $data['restaurantId'];
            $newOrder->save();

            foreach($data['cart'] as $item) {
                $dish = json_decode($item, true);
                $newOrder->dishes()->attach($dish['dishId'],[
                    'quantity' => $dish['quantity']
                ]);
            }

            // invio mail
            Mail::to($data['email'])->cc($newOrder->restaurant->email)->send(new NewOrderMail($data));

        }else{
            return response()->json([
                "success" => false,
                "errors" => 'Payment error'
            ], 400);
        }

        return response()->json(["success" => true], 200);
    }
}
