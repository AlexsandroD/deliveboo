<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::all();
        return response()->json($restaurants);
    }

    public function filterCategory(Request $request){
        $data = $request->all();

        $restaurants = Restaurant::select('address','city','country','description','email','image_cover','name','phone','post_code','restaurant_id as id','slug')
        ->join('category_restaurant','restaurants.id','=','category_restaurant.restaurant_id')
        ->whereIn('category_restaurant.category_id',$data['categories'])
        ->distinct()
        ->get();

        return response()->json($restaurants);
    }

    public function show($slug){
        $restaurant = Restaurant::where('slug',$slug)->with(['dishes'=> function($query){
            $query->where('deleted',0);
        }])->first();
        return response()->json($restaurant);
    }
}
