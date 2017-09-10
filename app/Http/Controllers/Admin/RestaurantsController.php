<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Category;
use App\City;
use App\Http\Requests\RestaurantRequest;
  
class RestaurantsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('city')->with('category')->get();

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurantCategories = Category::pluck('name', 'id');
        $cityType = City::pluck('name', 'id');

        return view('admin.restaurants.create', compact('restaurantCategories', 'cityType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $restaurantCategories = Category::pluck('name', 'id');
        $cityType = City::pluck('name', 'id');

        return view('admin.restaurants.edit', compact('restaurant', 'restaurantCategories', 'cityType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdviceRequest $request
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());

        return redirect()->route('admin.restaurants.index')->with('success', trans('message.success.update'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdviceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $restaurant = Restaurant::create($request->all());
 
        return redirect()->route('admin.restaurants.index')->with('success', trans('message.success.store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')->with('success', trans('message.success.delete'));
    }
}
