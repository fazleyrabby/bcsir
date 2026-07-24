@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-newspaper" style="color: var(--primary-emerald);"></i> {{ __('News') }}</h1>
            <p>Published: {{ $news->created_at->format('d M Y, h:i A') }}</p>
        </div>
    </div>

    <div class="container">
        <article class="card" style="padding: 32px;">
            <div style="font-size: 0.85rem; color: var(--primary-emerald); font-weight: 700; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-regular fa-calendar-days"></i> {{ $news->created_at->format('d F Y, h:i A') }}
            </div>
            <h1 style="font-size: 2rem; color: var(--primary-dark); font-weight: 800; line-height: 1.3; margin: 0 0 20px 0;">
                {{ $news->title }}
            </h1>

            @if($news->image)
                <div style="margin: 20px 0;">
                    <img src="{{ str_starts_with($news->image, 'http') ? $news->image : asset('images/' . $news->image) }}" alt="{{ $news->title }}" style="width:100%; max-height:450px; object-fit:cover; border-radius: var(--radius-md); border: 1px solid var(--border-subtle);" onerror="this.style.display='none'">
                </div>
            @endif

            <div style="font-size: 1.05rem; line-height: 1.8; color: var(--text-dark); margin-top: 25px;">
                {!! nl2br(e($news->body ?? '')) !!}
            </div>
        </article>

        @if($related && $related->isNotEmpty())
            <div class="card" style="margin-top: 30px;">
                <div class="card-header-styled">
                    <h3><i class="fa-solid fa-layer-group"></i> Related Articles</h3>
                </div>
                <div class="grid grid-2">
                    @foreach($related as $item)
                        <div style="padding: 15px; border-radius: var(--radius-sm); border: 1px solid var(--border-subtle); background: var(--bg-body);">
                            <div style="font-size: 0.78rem; color: var(--primary-emerald); font-weight: 700; margin-bottom: 4px;">
                                {{ $item->created_at->format('d M Y') }}
                            </div>
                            <h4 style="margin: 0;">
                                <a href="{{ route('news.show', $item->slug ?? $item->id) }}" style="text-decoration: none; color: var(--primary-dark); font-weight: 700;">
                                    {{ $item->title }}
                                </a>
                            </h4>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
