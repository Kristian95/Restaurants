<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
  
class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('productType')->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productType = ProductType::pluck('name', 'id');

        return view('admin.products.create', compact('productType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productType = ProductType::pluck('name', 'id');

        return view('admin.products.edit', compact('product', 'productType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdviceRequest $request
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', trans('message.success.update'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdviceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
 
        return redirect()->route('admin.products.index')->with('success', trans('message.success.store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', trans('message.success.delete'));
    }
}
