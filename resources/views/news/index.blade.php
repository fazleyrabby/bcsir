@extends('layouts.app')

@section('title', __('News & Media Bulletins') . ' - NIRST')

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-newspaper" style="color: var(--primary-emerald);"></i> {{ __('News & Media Bulletins') }}</h1>
            <p>{{ __('Latest announcements, scientific research updates, and events from NIRST') }}</p>
        </div>
    </div>

    <div class="container">
        <div class="grid grid-2">
            @forelse($newsList as $item)
                <div class="card" style="display: flex; flex-direction: column; overflow: hidden; padding: 0;">
                    @if($item->image)
                        <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('images/' . $item->image) }}" alt="{{ $item->title }}" style="width:100%; height:200px; object-fit:cover;">
                    @else
                        <div style="height: 140px; background: var(--primary-dark); display: flex; align-items: center; justify-content: center; color: var(--primary-emerald); font-size: 3rem;">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                    @endif
                    <div style="padding: 20px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <div style="font-size: 0.78rem; color: var(--primary-emerald); font-weight: 700; margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
                                <i class="fa-regular fa-calendar-days"></i> {{ $item->created_at->format('d M Y') }}
                            </div>
                            <h3 style="margin: 0 0 10px 0; font-size: 1.1rem; line-height: 1.4;">
                                <a href="{{ route('news.show', $item->slug ?? $item->id) }}" style="text-decoration:none; color:var(--primary-dark); font-weight:700;">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            <p style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.6; margin-bottom: 14px;">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->body ?? ''), 160) }}
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('news.show', $item->slug ?? $item->id) }}" class="btn btn-emerald" style="padding: 7px 16px; font-size: 0.82rem;">
                                {{ __('Read More') }} <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; padding: 40px; text-align: center; color: var(--text-muted);">
                    <p>No news articles currently published.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $newsList->links() }}
        </div>
    </div>
@endsection
