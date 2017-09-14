<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\News;
use App\Language;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')
            ->paginate(config('constants.per_page'));

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();

        return view('admin.news.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = News::create($request->all());

        $news->languages()->attach($request->input('languages', []));

        return redirect()->route('admin.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $languages = Language::all();

        $newsLanguageData = [];
        foreach ($news->languages as $language) {
            $newsLanguageData[$language->id] = $language;
        }

        return view('admin.news.edit', compact('news', 'languages', 'languages', 'newsLanguageData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsRequest $request
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        $news->update($request->all());

        $news->languages()->sync($request->input('languages', []));

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index');
    }
}