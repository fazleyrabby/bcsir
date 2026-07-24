<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = News::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('news.index', compact('newsList'));
    }

    public function show(News $news)
    {
        $related = News::where('is_active', true)
            ->where('id', '!=', $news->id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('news.show', compact('news', 'related'));
    }
}
