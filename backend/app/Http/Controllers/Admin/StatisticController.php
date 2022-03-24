<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Order;
use DateTime;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(){
        $restaurant = Restaurant::select('id')->where('user_id', Auth::id())->first();
        $restaurants_id = $restaurant->id;

        $date = new DateTime();
        $lastDay = $date->format('Y-m-t');
        $dateMinus12 = $date->modify('-11 months')->format('Y-m-01');

        $ordersRevenue = Order::where('restaurant_id', $restaurants_id)
        ->whereBetween('created_at', [$dateMinus12, $lastDay])
        ->selectRaw("SUM(tot_price) AS total")
        ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS date")
        ->groupby("date")
        ->orderBy("date", "DESC")
        ->get();

        $ordersCount = Order::where('restaurant_id', $restaurants_id)
        ->whereBetween('created_at', [$dateMinus12, $lastDay])
        ->selectRaw("COUNT(restaurant_id) AS orderTotal")
        ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS date")
        ->groupby("date")
        ->orderBy("date", "DESC")
        ->get();

        $dishesRank = Order::select('dishes.name','dishes.deleted',DB::raw("SUM(dish_order.quantity) as total"))
        ->join('dish_order','orders.id','=','dish_order.order_id')
        ->join('dishes','dish_order.dish_id','=','dishes.id')
        ->where('orders.restaurant_id','=',$restaurants_id)
        ->groupBy('dishes.name','dishes.deleted')
        ->orderByRaw('SUM(dish_order.quantity) desc')
        ->get();

        return view('admin.statistics.index', compact('ordersRevenue','ordersCount','dishesRank','restaurant'));
    }
}
