<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreNewsRequest $request)
    {
        if (isset($request['search'])) {
            $newses = News::where('title', 'LIKE', '%' . $request['search'] . '%')->paginate(10);
        } else {
            $newses = News::paginate(10);
        }
        return view('admin.news.index', [
            'title' => 'Victoria | News',
            'page' => 'news',
            'newses' => $newses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create', [
            'title' => 'Victoria | News add',
            'page' => 'news'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'string',
            'date' => 'string',
            'img_url' => 'string',
            'news_url' => 'string'
        ]);

        $news = News::create([
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'img_url' => $validatedData['img_url'],
            'news_url' => $validatedData['news_url'],
        ]);

        $news->save();

        if ($news->wasRecentlyCreated) {
            return redirect('admin/news')->with('success', 'Data berhasil dibuat');
        } else {
            return redirect('admin/news')->with('error', 'Data gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', [
            'title' => 'Victoria | News edit',
            'page' => 'news',
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'string',
            'date' => 'string',
            'img_url' => 'string',
            'news_url' => 'string'
        ]);

        $news->title = $validatedData['title'];
        $news->date = $validatedData['date'];
        $news->img_url = $validatedData['img_url'];
        $news->news_url = $validatedData['news_url'];

        $news->save();

        return redirect('admin/news')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect('admin/news')->with('success', 'Data berhasil dihapus');
    }
}
