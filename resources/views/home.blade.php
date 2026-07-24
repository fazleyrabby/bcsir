@extends('layouts.app')

@section('title', __('Home') . ' - ' . __('National Institute of Research, Science & Technology'))

@push('styles')
    <style>
        .hero-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .main-content-grid {
            display: grid;
            grid-template-columns: 2.3fr 1fr;
            gap: 24px;
        }

        .director-card-grid {
            display: grid;
            grid-template-columns: 130px 1fr;
            gap: 20px;
            align-items: center;
        }

        @media (max-width: 992px) {
            .hero-grid {
                grid-template-columns: 1fr !important;
                gap: 24px !important;
            }

            .main-content-grid {
                grid-template-columns: 1fr !important;
            }
        }

        @media (max-width: 576px) {
            .director-card-grid {
                grid-template-columns: 1fr !important;
                text-align: center;
            }

            .director-card-grid img {
                margin: 0 auto;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Showcase Section -->
    <div style="background: var(--primary-dark); color: #FFFFFF; padding: 50px 0 65px; border-bottom: 4px solid var(--primary-emerald); position: relative;">
        <div class="container">
            <div class="hero-grid">
                <div>
                    <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(0, 189, 139, 0.15); color: var(--primary-emerald); padding: 5px 14px; border-radius: var(--radius-sm); font-weight: 700; font-size: 0.82rem; margin-bottom: 16px; border: 1px solid rgba(0, 189, 139, 0.3);">
                        <i class="fa-solid fa-atom"></i> {{ __('National Institute of Research, Science & Technology') }}
                    </div>
                    <h1 style="font-size: clamp(1.8rem, 4vw, 2.5rem); font-weight: 800; line-height: 1.2; margin: 0 0 16px 0; letter-spacing: -0.01em;">
                        {{ __('Scientific Research & Innovation') }} <br><span style="color: var(--primary-emerald);">Advancing National Technology</span>
                    </h1>
                    <p style="font-size: 1rem; line-height: 1.6; opacity: 0.9; margin-bottom: 25px; max-width: 620px;">
                        National Institute of Research, Science & Technology (NIRST) is dedicated to driving scientific excellence, industrial research, and sustainable technological development.
                    </p>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="{{ route('departments.index') }}" class="btn btn-emerald" style="padding: 12px 24px; font-size: 0.95rem;">
                            <i class="fa-solid fa-flask"></i> {{ __('Departments') }}
                        </a>
                        <a href="{{ route('notices.index') }}" class="btn btn-outline" style="color: #FFFFFF; border-color: rgba(255,255,255,0.3); padding: 12px 24px; font-size: 0.95rem;">
                            <i class="fa-solid fa-file-lines"></i> {{ __('Notices') }}
                        </a>
                    </div>
                </div>

                <!-- Hero Clean Summary Card -->
                <div>
                    <div style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: var(--radius-md); padding: 25px;">
                        <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 16px; padding-bottom: 14px; border-bottom: 1px solid rgba(255,255,255,0.1);">
                            <div style="width: 44px; height: 44px; background: var(--primary-emerald); color: #04241C; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 800;">
                                <i class="fa-solid fa-atom"></i>
                            </div>
                            <div>
                                <h3 style="margin: 0; font-size: 1.1rem; color: #FFFFFF;">NIRST Research Complex</h3>
                                <small style="color: var(--primary-emerald); font-weight: 600;">Government Scientific Research Institute</small>
                            </div>
                        </div>
                        <p style="font-size: 0.9rem; color: #E2E8F0; line-height: 1.6; margin-bottom: 18px;">
                            Advanced research divisions in Microbiology, Phytochemistry, Drug Design, Hydrogen Energy, and Environmental Technology.
                        </p>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                            <div style="background: rgba(0, 189, 139, 0.15); padding: 12px; border-radius: var(--radius-sm); border: 1px solid rgba(0, 189, 139, 0.25); text-align: center;">
                                <div style="font-size: 1.3rem; font-weight: 800; color: var(--primary-emerald);">{{ $stats['departments'] }}+</div>
                                <div style="font-size: 0.75rem; color: #CBD5E1;">{{ __('Departments') }}</div>
                            </div>
                            <div style="background: rgba(0, 189, 139, 0.15); padding: 12px; border-radius: var(--radius-sm); border: 1px solid rgba(0, 189, 139, 0.25); text-align: center;">
                                <div style="font-size: 1.3rem; font-weight: 800; color: var(--primary-emerald);">{{ $stats['scientists'] }}+</div>
                                <div style="font-size: 0.75rem; color: #CBD5E1;">{{ __('Scientists') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Impact Metrics Bar (Real Dynamic DB Data) -->
    <div style="margin-top: -25px; position: relative; z-index: 10;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
                <div class="card" style="display: flex; align-items: center; gap: 16px; margin: 0;">
                    <div style="width: 44px; height: 44px; background: var(--primary-mint); color: var(--primary-dark); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-microscope" style="color: var(--primary-emerald);"></i>
                    </div>
                    <div>
                        <div style="font-size: 1.4rem; font-weight: 800; color: var(--primary-dark); line-height: 1;">{{ $stats['projects'] }}+</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600; margin-top: 3px;">{{ __('Active Research Projects') }}</div>
                    </div>
                </div>

                <div class="card" style="display: flex; align-items: center; gap: 16px; margin: 0;">
                    <div style="width: 44px; height: 44px; background: var(--primary-mint); color: var(--primary-dark); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-flask-vial" style="color: var(--primary-emerald);"></i>
                    </div>
                    <div>
                        <div style="font-size: 1.4rem; font-weight: 800; color: var(--primary-dark); line-height: 1;">{{ $stats['departments'] }}+</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600; margin-top: 3px;">{{ __('Specialized Laboratories') }}</div>
                    </div>
                </div>

                <div class="card" style="display: flex; align-items: center; gap: 16px; margin: 0;">
                    <div style="width: 44px; height: 44px; background: var(--primary-mint); color: var(--primary-dark); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-user-doctor" style="color: var(--primary-emerald);"></i>
                    </div>
                    <div>
                        <div style="font-size: 1.4rem; font-weight: 800; color: var(--primary-dark); line-height: 1;">{{ $stats['scientists'] }}+</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600; margin-top: 3px;">{{ __('Research Scientists') }}</div>
                    </div>
                </div>

                <div class="card" style="display: flex; align-items: center; gap: 16px; margin: 0;">
                    <div style="width: 44px; height: 44px; background: var(--primary-mint); color: var(--primary-dark); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-book-bookmark" style="color: var(--primary-emerald);"></i>
                    </div>
                    <div>
                        <div style="font-size: 1.4rem; font-weight: 800; color: var(--primary-dark); line-height: 1;">{{ $stats['publications'] }}+</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600; margin-top: 3px;">{{ __('International Publications') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div style="padding: 40px 0;">
        <div class="container">
            <div class="main-content-grid">
                <!-- Main Left Column -->
                <div>
                    <!-- Director / Leadership Feature Message -->
                    @php
                        $director = \App\Models\Employee::where('type', 'director')->first() ?? \App\Models\Employee::first();
                    @endphp
                    <div class="card" style="background: var(--bg-card);">
                        <div class="director-card-grid">
                            <div>
                                <img src="{{ str_starts_with($director->photo ?? '', 'http') ? $director->photo : asset('images/' . ($director->photo ?? '')) }}" alt="{{ $director->name ?? 'Director' }}" style="width: 110px; height: 125px; object-fit: cover; border-radius: var(--radius-sm); border: 2px solid var(--primary-emerald);">
                            </div>
                            <div>
                                <div style="display: inline-block; background: var(--primary-mint); color: var(--primary-dark); padding: 2px 10px; border-radius: var(--radius-sm); font-size: 0.76rem; font-weight: 700; margin-bottom: 6px;">
                                    {{ __('Message from Director') }}
                                </div>
                                <h3 style="margin: 0 0 4px 0; color: var(--primary-dark); font-size: 1.2rem;">{{ $director->name ?? 'Dr. Aris Rahman' }}</h3>
                                <div style="color: var(--primary-emerald); font-weight: 600; font-size: 0.85rem; margin-bottom: 10px;">{{ $director->designation ?? 'Director General, NIRST' }}</div>
                                <p style="font-size: 0.9rem; color: var(--text-muted); margin: 0; line-height: 1.6;">
                                    "{{ $director->bio ?? 'NIRST is committed to industrial innovation, quality testing, and driving scientific advancement for Bangladesh.' }}"
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Latest News Grid -->
                    <div class="card">
                        <div class="card-header-styled">
                            <h2><i class="fa-solid fa-newspaper"></i> {{ __('Latest News') }}</h2>
                            <a href="{{ route('news.index') }}" class="btn btn-outline" style="padding: 5px 12px; font-size: 0.8rem;">{{ __('Read More') }} →</a>
                        </div>
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px;">
                            @forelse($latestNews as $item)
                                <div style="border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); overflow: hidden; background: #FFFFFF; display: flex; flex-direction: column;">
                                    @if($item->image)
                                        <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('images/' . $item->image) }}" alt="{{ $item->title }}" style="width:100%; height:140px; object-fit:cover;">
                                    @else
                                        <div style="height: 100px; background: var(--primary-mint); display: flex; align-items: center; justify-content: center; color: var(--primary-emerald); font-size: 1.8rem;">
                                            <i class="fa-solid fa-newspaper"></i>
                                        </div>
                                    @endif
                                    <div style="padding: 14px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                        <div>
                                            <div style="font-size: 0.76rem; color: var(--primary-emerald); font-weight: 700; margin-bottom: 5px; display: flex; align-items: center; gap: 5px;">
                                                <i class="fa-regular fa-calendar-days"></i> {{ $item->created_at->format('d M Y') }}
                                            </div>
                                            <h4 style="margin: 0 0 8px 0; font-size: 0.95rem; line-height: 1.4;">
                                                <a href="{{ route('news.show', $item->slug ?? $item->id) }}" style="text-decoration:none; color:var(--primary-dark); font-weight:700;">
                                                    {{ \Illuminate\Support\Str::limit($item->title, 75) }}
                                                </a>
                                            </h4>
                                        </div>
                                        <a href="{{ route('news.show', $item->slug ?? $item->id) }}" style="font-size: 0.82rem; color: var(--primary-emerald); font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; margin-top: 8px;">
                                            {{ __('Read More') }} <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <p style="color: var(--text-muted);">No news available.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Notice Board Grid -->
                    <div class="card">
                        <div class="card-header-styled">
                            <h2><i class="fa-solid fa-bullhorn"></i> {{ __('Notice Board') }}</h2>
                            <a href="{{ route('notices.index') }}" class="btn btn-outline" style="padding: 5px 12px; font-size: 0.8rem;">{{ __('Notices') }} →</a>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            @forelse($latestNotices as $item)
                                <div style="display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: var(--radius-sm); border: 1px solid var(--border-subtle); background: var(--bg-body); flex-wrap: wrap;">
                                    <div style="min-width: 36px; height: 36px; background: var(--primary-dark); color: var(--primary-emerald); border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 1rem;">
                                        <i class="fa-solid fa-file-pdf"></i>
                                    </div>
                                    <div style="flex: 1; min-width: 200px;">
                                        <div style="font-size: 0.74rem; color: var(--text-muted); font-weight: 600;">
                                            <i class="fa-regular fa-clock"></i> {{ $item->created_at->format('d M Y') }}
                                        </div>
                                        <a href="{{ route('notices.show', $item->slug ?? $item->id) }}" style="text-decoration: none; color: var(--text-dark); font-weight: 700; font-size: 0.9rem;">
                                            {{ \Illuminate\Support\Str::limit($item->title, 90) }}
                                        </a>
                                    </div>
                                    <a href="{{ route('notices.show', $item->slug ?? $item->id) }}" class="btn btn-emerald" style="padding: 5px 12px; font-size: 0.78rem; white-space: nowrap;">
                                        <i class="fa-solid fa-download"></i> {{ __('Download') }}
                                    </a>
                                </div>
                            @empty
                                <p style="color: var(--text-muted);">No notices available.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Column -->
                <div>
                    <!-- Core Services / E-Services Quick Grid -->
                    <div class="card" style="background: var(--primary-dark); color: #FFFFFF;">
                        <h3 style="color: #FFFFFF; font-size: 1.1rem; margin: 0 0 14px 0; border-bottom: 2px solid var(--primary-emerald); padding-bottom: 8px;">
                            <i class="fa-solid fa-grid-2" style="color: var(--primary-emerald);"></i> {{ __('Important Services (E-Services)') }}
                        </h3>
                        <div style="display: grid; grid-template-columns: 1fr; gap: 8px;">
                            <a href="#" style="background: rgba(255,255,255,0.06); padding: 10px 12px; border-radius: var(--radius-sm); color: #FFFFFF; text-decoration: none; font-weight: 600; font-size: 0.85rem; display: flex; align-items: center; gap: 10px; border: 1px solid rgba(255,255,255,0.1);">
                                <i class="fa-solid fa-vial-circle-check" style="color: var(--primary-emerald); font-size: 1rem;"></i>
                                <span>{{ __('Testing & Calibration') }}</span>
                            </a>
                            <a href="#" style="background: rgba(255,255,255,0.06); padding: 10px 12px; border-radius: var(--radius-sm); color: #FFFFFF; text-decoration: none; font-weight: 600; font-size: 0.85rem; display: flex; align-items: center; gap: 10px; border: 1px solid rgba(255,255,255,0.1);">
                                <i class="fa-solid fa-award" style="color: var(--primary-emerald); font-size: 1rem;"></i>
                                <span>{{ __('Citizen Charter') }}</span>
                            </a>
                            <a href="#" style="background: rgba(255,255,255,0.06); padding: 10px 12px; border-radius: var(--radius-sm); color: #FFFFFF; text-decoration: none; font-weight: 600; font-size: 0.85rem; display: flex; align-items: center; gap: 10px; border: 1px solid rgba(255,255,255,0.1);">
                                <i class="fa-solid fa-file-contract" style="color: var(--primary-emerald); font-size: 1rem;"></i>
                                <span>{{ __('Annual Performance Agreement') }}</span>
                            </a>
                            <a href="#" style="background: rgba(255,255,255,0.06); padding: 10px 12px; border-radius: var(--radius-sm); color: #FFFFFF; text-decoration: none; font-weight: 600; font-size: 0.85rem; display: flex; align-items: center; gap: 10px; border: 1px solid rgba(255,255,255,0.1);">
                                <i class="fa-solid fa-lightbulb" style="color: var(--primary-emerald); font-size: 1rem;"></i>
                                <span>{{ __('Innovation & Patents') }}</span>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Page Links -->
                    @if($quickLinks->isNotEmpty())
                        <div class="card">
                            <div class="card-header-styled">
                                <h3><i class="fa-solid fa-link"></i> {{ __('Quick Links') }}</h3>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 6px;">
                                @foreach($quickLinks as $link)
                                    <a href="{{ route('pages.show', $link->slug) }}" style="text-decoration:none; color:var(--text-dark); font-weight:600; font-size:0.85rem; padding:9px 12px; background:var(--primary-mint-light); border-radius:var(--radius-sm); display:flex; align-items:center; justify-content:space-between; border:1px solid var(--border-subtle);">
                                        <span>{{ $link->title }}</span>
                                        <i class="fa-solid fa-chevron-right" style="font-size: 0.72rem; color: var(--primary-emerald);"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Emergency Help Line Card -->
                    <div class="card" style="background: #FEF3C7; border-color: #F59E0B;">
                        <h4 style="margin: 0 0 8px 0; color: #92400E; font-size: 1rem;">
                            <i class="fa-solid fa-shield-halved" style="color: #D97706;"></i> Emergency Hotlines
                        </h4>
                        <div style="font-size: 0.85rem; color: #78350F; line-height: 1.6;">
                            <div><strong>Emergency Services:</strong> 333 / 999</div>
                            <div><strong>NIRST Desk:</strong> +880-2-9876543</div>
                            <div><strong>Email:</strong> info@nirst.gov.bd</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
