@extends('layouts.app')

@section('title', __('Research') . ' - NIRST')

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-microscope" style="color: var(--primary-emerald);"></i> {{ __('Research') }}</h1>
            <p>Peer-reviewed scientific journals, patents, and technical project reports from NIRST</p>
        </div>
    </div>

    <div class="container">
        <div class="grid grid-2">
            @forelse($research as $item)
                <div class="card" style="display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 10px;">
                            <span style="display: inline-block; background: var(--primary-mint); color: var(--primary-dark); font-size: 0.78rem; font-weight: 700; padding: 2px 10px; border-radius: var(--radius-sm);">
                                <i class="fa-solid fa-flask"></i> Scientific Paper
                            </span>
                            @if($item->year)
                                <span style="font-size: 0.82rem; font-weight: 700; color: var(--primary-emerald);">
                                    <i class="fa-regular fa-calendar"></i> {{ $item->year }}
                                </span>
                            @endif
                        </div>

                        <h3 style="margin: 0 0 10px 0; font-size: 1.1rem; line-height: 1.4;">
                            <a href="{{ route('research.show', $item) }}" style="text-decoration:none; color:var(--primary-dark); font-weight:700;">
                                {{ $item->title }}
                            </a>
                        </h3>

                        @if($item->scientist)
                            <div style="font-size: 0.85rem; color: var(--primary-emerald); font-weight: 600; margin-bottom: 10px;">
                                <i class="fa-solid fa-user-astronaut"></i> {{ $item->scientist->name }}
                            </div>
                        @endif

                        @if($item->abstract)
                            <p style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.6; margin-bottom: 16px;">
                                {{ \Illuminate\Support\Str::limit($item->abstract, 170) }}
                            </p>
                        @endif
                    </div>

                    <div style="display: flex; gap: 8px; align-items: center; border-top: 1px solid var(--border-subtle); padding-top: 12px;">
                        @if($item->file)
                            <a href="{{ asset('storage/research/' . $item->file) }}" class="btn btn-emerald" target="_blank" style="padding: 6px 14px; font-size: 0.8rem;">
                                <i class="fa-solid fa-file-arrow-down"></i> {{ __('Download') }}
                            </a>
                        @endif
                        <a href="{{ route('research.show', $item) }}" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem;">
                            View Abstract →
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; padding: 40px; text-align: center; color: var(--text-muted);">
                    <p>No research publications listed.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $research->links() }}
        </div>
    </div>
@endsection
