@extends('layouts.app')

@section('title', $notice->title)

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-bullhorn" style="color: var(--primary-emerald);"></i> Official Notice Detail</h1>
            <p>Published: {{ $notice->created_at->format('d M Y, h:i A') }}</p>
        </div>
    </div>

    <div class="container">
        <article class="card" style="border-top: 5px solid var(--primary-emerald); padding: 32px;">
            <div style="font-size: 0.85rem; color: var(--primary-emerald); font-weight: 700; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-regular fa-calendar-days"></i> {{ $notice->created_at->format('d F Y, h:i A') }}
            </div>
            <h1 style="font-size: 1.8rem; color: var(--primary-dark); font-weight: 800; line-height: 1.35; margin: 0 0 20px 0;">
                {{ $notice->title }}
            </h1>

            @if($notice->body)
                <div style="font-size: 1.05rem; line-height: 1.8; color: var(--text-dark); margin: 20px 0;">
                    {!! nl2br(e($notice->body)) !!}
                </div>
            @endif

            @if($notice->file)
                <div style="margin-top: 30px; padding: 20px; background: var(--primary-mint-light); border-radius: var(--radius-md); border: 1px solid var(--border-subtle); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <i class="fa-solid fa-file-pdf" style="font-size: 2.2rem; color: #EF4444;"></i>
                        <div>
                            <div style="font-weight: 700; color: var(--primary-dark);">Attached Official Document</div>
                            <small style="color: var(--text-muted);">PDF / Document File</small>
                        </div>
                    </div>
                    <a href="{{ asset('uploads/' . $notice->file) }}" class="btn btn-emerald" target="_blank" style="padding: 10px 22px;">
                        <i class="fa-solid fa-download"></i> Download File Attachment
                    </a>
                </div>
            @endif
        </article>
    </div>
@endsection
