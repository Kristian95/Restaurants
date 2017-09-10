<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductTypeRequest;
use App\ProductType;
  
class ProductTypesController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::all();

        return view('admin.productTypes.index', compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productTypes.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        return view('admin.productTypes.edit', compact('productType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdviceRequest $request
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function update(ProductTypeRequest $request, ProductType $productType)
    {
        $productType->update($request->all());

        return redirect()->route('admin.productTypes.index')->with('success', trans('message.success.update'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdviceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeRequest $request)
    {
        $productType = ProductType::create($request->all());
 
        return redirect()->route('admin.productTypes.index')->with('success', trans('message.success.store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();

        return redirect()->route('admin.productTypes.index')->with('success', trans('message.success.delete'));
    }
}
