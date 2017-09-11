<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Manager;
use App\Restaurant;
use App\Http\Requests\ManagerRequest;
  
class ManagersController extends Controller
{
    public function index()
    {
        $managers = Manager::with('restaurant')->get();

        return view('admin.managers.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurantList = Restaurant::pluck('title', 'id');

        return view('admin.managers.create', compact('restaurantList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $restaurantList = Restaurant::pluck('title', 'id');

        return view('admin.managers.edit', compact('manager', 'restaurantList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdviceRequest $request
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function update(ManagerRequest $request, Manager $manager)
    {
        $manager->update($request->all());

        return redirect()->route('admin.managers.index')->with('success', trans('message.success.update'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdviceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerRequest $request)
    {
        $manager = Manager::create($request->all());
 
        return redirect()->route('admin.managers.index')->with('success', trans('message.success.store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();

        return redirect()->route('admin.managers.index')->with('success', trans('message.success.delete'));
    }
}
