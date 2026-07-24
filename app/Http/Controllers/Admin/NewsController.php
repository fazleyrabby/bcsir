<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = News::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        return view('admin.news.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:1000',
            'slug'         => 'nullable|string|max:255|unique:news',
            'body'         => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'published_at' => 'nullable|date',
            'is_active'    => 'boolean',
        ]);

        $validated['slug']     = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['added_by']  = auth('admin')->user()?->name ?? 'admin';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/news'), $filename);
            $validated['image'] = 'news/' . $filename;
        } else {
            unset($validated['image']);
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:1000',
            'slug'         => 'nullable|string|max:255|unique:news,slug,' . $news->id,
            'body'         => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'published_at' => 'nullable|date',
            'is_active'    => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image && file_exists(public_path('images/' . $news->image))) {
                unlink(public_path('images/' . $news->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/news'), $filename);
            $validated['image'] = 'news/' . $filename;
        } else {
            unset($validated['image']);
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        if ($news->image && file_exists(public_path('images/' . $news->image))) {
            unlink(public_path('images/' . $news->image));
        }
        $news->delete();
        return redirect()->route('admin.news.index')
            ->with('success', 'News deleted successfully.');
    }
}

