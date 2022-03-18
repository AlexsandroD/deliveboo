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
}
