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
        ->where(DB::raw("YEAR(created_at)"), date("Y"))
        ->selectRaw("SUM(tot_price) AS total")
        ->selectRaw("YEAR(created_at) AS year")
        ->selectRaw("MONTH(created_at) AS month")
        ->groupby("year","month")
        ->get();

        return view('admin.statistics.index', compact('orders','restaurant'));
    }
}
