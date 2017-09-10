<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
  
class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdviceRequest $request
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', trans('message.success.update'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdviceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
 
        return redirect()->route('admin.categories.index')->with('success', trans('message.success.store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', trans('message.success.delete'));
    }
}
