@extends('layouts.app')

@section('title', $research->title)

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-microscope" style="color: var(--primary-emerald);"></i> Publication Abstract</h1>
            <p>Research Details & Findings</p>
        </div>
    </div>

    <div class="container">
        <article class="card" style="border-top: 5px solid var(--primary-dark); padding: 32px;">
            <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap; margin-bottom: 15px;">
                <span style="background: var(--primary-mint); color: var(--primary-dark); font-size: 0.8rem; font-weight: 700; padding: 4px 14px; border-radius: 50px;">
                    Research Paper
                </span>
                @if($research->year)
                    <span style="font-size: 0.88rem; font-weight: 700; color: var(--primary-emerald);">
                        <i class="fa-regular fa-calendar"></i> Year: {{ $research->year }}
                    </span>
                @endif
            </div>

            <h1 style="font-size: 1.8rem; color: var(--primary-dark); font-weight: 800; line-height: 1.35; margin: 0 0 20px 0;">
                {{ $research->title }}
            </h1>

            @if($research->scientist)
                <div style="padding: 14px; background: var(--bg-body); border-radius: var(--radius-sm); border: 1px solid var(--border-subtle); margin-bottom: 25px; display: inline-flex; align-items: center; gap: 12px;">
                    <i class="fa-solid fa-user-astronaut" style="font-size: 1.4rem; color: var(--primary-emerald);"></i>
                    <div>
                        <div style="font-size: 0.76rem; color: var(--text-muted); font-weight: 600;">LEAD SCIENTIST / AUTHOR</div>
                        <a href="{{ route('scientists.show', $research->scientist) }}" style="font-weight: 700; color: var(--primary-dark); text-decoration: none;">
                            {{ $research->scientist->name }}
                        </a>
                    </div>
                </div>
            @endif

            @if($research->abstract)
                <div style="margin: 20px 0;">
                    <h3 style="color: var(--primary-dark); margin: 0 0 10px 0; font-size: 1.2rem;">Abstract & Highlights</h3>
                    <div style="font-size: 1.05rem; line-height: 1.8; color: var(--text-dark);">
                        {!! nl2br(e($research->abstract)) !!}
                    </div>
                </div>
            @endif

            @if($research->file)
                <div style="margin-top: 30px; padding: 20px; background: var(--primary-mint-light); border-radius: var(--radius-md); border: 1px solid var(--border-subtle); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <i class="fa-solid fa-file-pdf" style="font-size: 2.2rem; color: var(--primary-dark);"></i>
                        <div>
                            <div style="font-weight: 700; color: var(--primary-dark);">Full Scientific Publication (PDF)</div>
                            <small style="color: var(--text-muted);">Verified Research Document</small>
                        </div>
                    </div>
                    <a href="{{ asset('storage/research/' . $research->file) }}" class="btn btn-emerald" target="_blank" style="padding: 10px 22px;">
                        <i class="fa-solid fa-download"></i> Download Full Paper
                    </a>
                </div>
            @endif
        </article>
    </div>
@endsection
