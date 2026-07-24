@extends('layouts.app')

@section('title', __('Notice Board') . ' - NIRST')

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-bullhorn" style="color: var(--primary-emerald);"></i> {{ __('Notice Board') }}</h1>
            <p>Official circulars, office orders, press releases, and tenders</p>
        </div>
    </div>

    <div class="container">
        <div style="display: flex; flex-direction: column; gap: 14px;">
            @forelse($notices as $notice)
                <div class="card" style="margin: 0;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 15px;">
                        <div style="flex: 1; min-width: 280px;">
                            <div style="font-size: 0.78rem; color: var(--primary-emerald); font-weight: 700; margin-bottom: 5px; display: flex; align-items: center; gap: 6px;">
                                <i class="fa-regular fa-calendar-days"></i> {{ $notice->created_at->format('d M Y, h:i A') }}
                            </div>
                            <h3 style="margin: 0 0 8px 0; font-size: 1.1rem;">
                                <a href="{{ route('notices.show', $notice->slug ?? $notice->id) }}" style="text-decoration:none; color:var(--primary-dark); font-weight:700;">
                                    {{ $notice->title }}
                                </a>
                            </h3>
                            @if($notice->body)
                                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin: 0;">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($notice->body), 180) }}
                                </p>
                            @endif
                        </div>

                        <div style="display: flex; gap: 8px; align-items: center;">
                            @if($notice->file)
                                <a href="{{ asset('uploads/' . $notice->file) }}" class="btn btn-emerald" target="_blank" style="padding: 7px 14px; font-size: 0.82rem;">
                                    <i class="fa-solid fa-file-arrow-down"></i> {{ __('Download') }}
                                </a>
                            @endif
                            <a href="{{ route('notices.show', $notice->slug ?? $notice->id) }}" class="btn btn-outline" style="padding: 7px 14px; font-size: 0.82rem;">
                                View Details →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card" style="text-align: center; padding: 40px; color: var(--text-muted);">
                    <p>No notices currently listed.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $notices->links() }}
        </div>
    </div>
@endsection
