<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\Restaurant;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{

    protected $validationRule = [
        "name" => "required|string|max:100",
        "description" => "nullable|string",
        "price" => "required|numeric",
        "visible" => "sometimes|accepted",
        "image" => "nullable|mimes:jpg,jpeg,png|max:2048"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::select('id')->where('user_id', Auth::id())->first();
        $restaurants_id = $restaurant->id;
        $dishes = Dish::where('restaurant_id', $restaurants_id)->where('deleted',false)->get();
        return view("admin.dishes.index", compact("dishes","restaurant"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurant = true;
        return view("admin.dishes.create",compact("restaurant"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate($this->validationRule);

        // add data
        $data = $request->all();

        // get restaurant id
        $restaurant = Restaurant::select('id')->where('user_id', Auth::id())->first();
        $restaurants_id = $restaurant->id;

        $newDish = new Dish();
        $newDish->fill($data);
        $newDish->visible = isset($data["visible"]);
        $newDish->restaurant_id = $restaurants_id;

        if( isset($data['image']) ) {
            $path_image = Storage::put("uploads/dish_images",$data['image']);
            $newDish->image = $path_image;
        }

        $newDish->save();

        // redirect
        return redirect()->route("dishes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $restaurant = Restaurant::select('id')->where('user_id', Auth::id())->first();
        $restaurants_id = $restaurant->id;

        if($dish->restaurant_id === $restaurants_id && $dish->deleted == false){
            return view("admin.dishes.show", compact("dish",'restaurant'));
        }else{
            return abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $restaurant = Restaurant::select('id')->where('user_id', Auth::id())->first();
        $restaurants_id = $restaurant->id;

        if($dish->restaurant_id === $restaurants_id && $dish->deleted == false){
            return view("admin.dishes.edit", compact("dish","restaurant"));
        }else{
            return abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        // validation
        $request->validate($this->validationRule);
        // add data
        $data = $request->all();

        if( isset($data['image']) ) {
            Storage::delete($dish->image);
            $path_image = Storage::put("uploads/dish_images",$data['image']);
            $dish->image = $path_image;
        }

        $dish->fill($data);
        $dish->visible = isset($data["visible"]);


        $dish->save();

        // redirect
        return redirect()->route("dishes.show", $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {

        $dish->deleted=true;
        $dish->save();
        return redirect()->route("dishes.index");
    }
}
