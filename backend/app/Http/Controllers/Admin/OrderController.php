<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::select('id')->where('user_id', Auth::id())->first();
        $restaurants_id = $restaurant->id;
        $orders = Order::where('restaurant_id', $restaurants_id)->with('dishes')->orderBy('created_at', 'DESC')->get();
        return view("admin.orders.index", compact("orders", "restaurant"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
      $restaurant = Restaurant::select('id')->where('user_id', Auth::id())->first();
      $restaurants_id = $restaurant->id;

      if($order->restaurant_id === $restaurants_id){
          return view("admin.orders.show", compact("order",'restaurant'));
      }else{
          return redirect()->route("orders.index");
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order)
    {
        $order->accepted = true;
        $order->save();
        return redirect()->route("orders.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {

        $order->delete();

        return redirect()->route('orders.index');
    }
}
