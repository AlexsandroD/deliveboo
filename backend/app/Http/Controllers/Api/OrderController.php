<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Order;


class OrderController extends Controller
{
    public function token(Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        return response()->json($token);
    }

    public function payment(Request $request, Gateway $gateway){
        $data = $request->all();
        $payment = $gateway->transaction()->sale([
            "amount" => $data["totalPrice"],
            "paymentMethodNonce"=>$data["nonce"],
            "options"=>[
                "submitForSettlement"=> true
            ],
        ]);

        if($payment->success){
            // aggiunata ordine se successful

        }else{
            // risultato negativo
        }

        return response()->json($payment);
    }
}
