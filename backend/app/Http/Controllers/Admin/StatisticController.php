<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Order;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(){
        $restaurant = Restaurant::select('id')->where('user_id', Auth::id())->first();
        $restaurants_id = $restaurant->id;

        $orders = Order::where('restaurant_id',13)
        ->selectRaw("SUM(tot_price) AS total")
        ->selectRaw("CONCAT(YEAR(created_at), '-', MONTH(created_at)) AS date")
        ->groupby("date")
        ->get();

        dump($orders);
    }
}
