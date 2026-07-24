@extends('layouts.app')

@section('title', $album->name)

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-images" style="color: var(--primary-emerald);"></i> {{ $album->name }}</h1>
            @if($album->description)
                <p>{{ $album->description }}</p>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="grid grid-4" x-data="{ lightbox: null }">
            @forelse($items as $item)
                @php
                    $imgUrl = str_starts_with($item->file, 'http') ? $item->file : asset('images/' . $item->file);
                @endphp
                <div class="card" @click="lightbox = '{{ $imgUrl }}'" style="cursor:pointer; padding:10px; margin:0; text-align:center; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                    @if($item->type === 'image')
                        <img src="{{ $imgUrl }}" alt="{{ $item->title ?? 'Gallery image' }}" style="width:100%; height:180px; object-fit:cover; border-radius: var(--radius-sm);" onerror="this.src='https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=1000&q=80';">
                    @else
                        <div style="width:100%; height:180px; background: var(--primary-dark); display:flex; align-items:center; justify-content:center; color: var(--primary-emerald); border-radius: var(--radius-sm); font-weight:700; font-size:1.2rem;">
                            <i class="fa-solid fa-play"></i> &nbsp; Video
                        </div>
                    @endif
                    @if($item->title)
                        <p style="margin: 10px 0 0 0; font-size: 0.85rem; font-weight: 600; color: var(--primary-dark);">{{ $item->title }}</p>
                    @endif
                </div>
            @empty
                <div style="grid-column: 1 / -1; padding: 40px; text-align: center; color: var(--text-muted);">
                    <p>No photos or media in this album.</p>
                </div>
            @endforelse

            <!-- Lightbox Overlay (Alpine.js) -->
            <div x-show="lightbox" x-cloak @click="lightbox = null" @keydown.escape="lightbox = null" style="position:fixed; inset:0; background:rgba(6,37,30,0.92); backdrop-filter:blur(8px); z-index:9999; display:flex; align-items:center; justify-content:center; padding:20px;">
                <div @click.stop style="text-align:center; max-width:92vw;">
                    <img :src="lightbox" style="max-width:90vw; max-height:82vh; border-radius: var(--radius-md); box-shadow: 0 20px 40px rgba(0,0,0,0.5); border: 3px solid var(--primary-emerald);">
                    <div style="margin-top: 15px;">
                        <button @click="lightbox = null" class="btn btn-emerald" style="padding: 10px 24px;">
                            <i class="fa-solid fa-xmark"></i> Close Preview
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>[x-cloak] { display: none !important; }</style>
@endpush
