@extends('layouts.app')

@section('title', 'Photo & Media Gallery')

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-images" style="color: var(--primary-emerald);"></i> Photo & Media Gallery</h1>
            <p>Visual highlights of research events, lab achievements, and seminars at BCSIR Chittagong</p>
        </div>
    </div>

    <div class="container">
        <div class="grid grid-3">
            @forelse($albums as $album)
                <div class="card" style="display: flex; flex-direction: column; justify-content: space-between; overflow: hidden; border-top: 4px solid var(--primary-emerald);">
                    <div>
                        <div style="height: 120px; background: var(--primary-mint); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--primary-emerald); font-size: 2.5rem; margin-bottom: 15px;">
                            <i class="fa-solid fa-folder-open"></i>
                        </div>
                        <h3 style="margin: 0 0 10px 0;">
                            <a href="{{ route('gallery.show', $album) }}" style="text-decoration:none; color:var(--primary-dark); font-weight:700;">
                                {{ $album->name }}
                            </a>
                        </h3>
                        @if($album->description)
                            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 15px;">
                                {{ \Illuminate\Support\Str::limit($album->description, 100) }}
                            </p>
                        @endif
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 12px; border-top: 1px solid var(--border-subtle);">
                        <span style="font-size: 0.82rem; font-weight: 700; color: var(--primary-emerald);">
                            <i class="fa-solid fa-camera"></i> {{ $album->items_count }} Media Files
                        </span>
                        <a href="{{ route('gallery.show', $album) }}" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem;">
                            Open Album →
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; padding: 40px; text-align: center; color: var(--text-muted);">
                    <p>No photo albums created yet.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
