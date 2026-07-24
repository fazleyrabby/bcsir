<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::where('is_active', true)
            ->withCount('items')
            ->get();

        return view('gallery.index', compact('albums'));
    }

    public function show(GalleryAlbum $album)
    {
        $items = $album->items()->where('is_active', true)->get();
        return view('gallery.show', compact('album', 'items'));
    }
}
