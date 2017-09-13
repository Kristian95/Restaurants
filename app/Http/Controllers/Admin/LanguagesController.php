<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LanguageRequest;
use App\Language;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();

        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $language = Language::create($request->all());


        $request->session()->flash('success', trans('success.language.store'));

        return redirect()->route('admin.languages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LanguageRequest  $request
     * @param  Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $language->update($request->all());

        $language->touch();

        $request->session()->flash('success', trans('success.languages.update'));

        return redirect()->route('admin.languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('admin.languages.index');
    }
}
