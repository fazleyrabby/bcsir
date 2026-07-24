<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::withCount('items')->orderBy('name')->paginate(10);
        return view('admin.gallery.index', compact('albums'));
    }

    public function create()
    {
        return view('admin.gallery.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        GalleryAlbum::create($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Album created successfully.');
    }

    public function edit(GalleryAlbum $gallery)
    {
        $album = $gallery;
        $items = $album->items()->where('is_active', true)->get();
        return view('admin.gallery.form', compact('album', 'items'));
    }

    public function update(Request $request, GalleryAlbum $gallery)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Album updated successfully.');
    }

    public function destroy(GalleryAlbum $gallery)
    {
        $gallery->items()->delete();
        $gallery->delete();
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Album deleted successfully.');
    }
}
