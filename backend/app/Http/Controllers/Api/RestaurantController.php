<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::with('categories')->paginate(10);
        return response()->json($restaurants);
    }

    public function filterCategory(Request $request){
        $data = $request->all();

        if (isset($data['categories'])) {
            $totalRestaurants = Restaurant::select('address','city','country','description','email','image_cover','name','phone','post_code','restaurant_id as id','slug')
            ->join('category_restaurant','restaurants.id','=','category_restaurant.restaurant_id')
            ->whereIn('category_restaurant.category_id',$data['categories'])
            ->Where('name','like','%'.$data['search'].'%')
            ->distinct()
            ->with('categories')
            ->get();
        } else {
            $totalRestaurants = Restaurant::select('address','city','country','description','email','image_cover','name','phone','post_code','restaurant_id as id','slug')
            ->join('category_restaurant','restaurants.id','=','category_restaurant.restaurant_id')
            ->Where('name','like','%'.$data['search'].'%')
            ->distinct()
            ->with('categories')
            ->get();
        }


        $total = count($totalRestaurants);
        $per_page = 10;
        $current_page = $data['page'];

        $starting_point = ($current_page * $per_page) - $per_page;

        $restaurants = $totalRestaurants->toArray();
        $restaurants = array_slice($restaurants, $starting_point, $per_page, true);

        $restaurants = new Paginator($restaurants, $total, $per_page, $current_page, [
            'path' => $request->url(),
            'query' => $request->query()
        ]);

        return response()->json($restaurants);
    }

    public function show($slug){
        $restaurant = Restaurant::where('slug',$slug)->with(['dishes'=> function($query){
            $query->where('deleted',0);
        }])->first();
        return response()->json($restaurant);
    }
}
