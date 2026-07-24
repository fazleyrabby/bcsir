<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'NIRST') - {{ __('National Institute of Research, Science & Technology') }}</title>

    <!-- Open Graph -->
    <meta property="og:site_name" content="NIRST">
    <meta property="og:title" content="@yield('og_title', __('National Institute of Research, Science & Technology'))">
    <meta property="og:description" content="@yield('og_description', __('National Institute of Research, Science & Technology (NIRST) - Dedicated to industrial research and scientific technological development for Bangladesh.'))">
    <meta property="og:image" content="{{ url('nirst-og.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ url('nirst-og.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Hind Siliguri -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Alpine.js for lightweight mobile interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @if(file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        :root {
            --primary-dark: #0A4C3B;
            --primary-deep: #053327;
            --primary-emerald: #00BD8D;
            --primary-emerald-hover: #00a37a;
            --primary-mint: #EBF9F5;
            --primary-mint-light: #F4FCFA;
            --accent-red: #D92D20;
            --accent-red-hover: #B91C1C;
            --accent-red-light: #FEF2F2;
            --accent-red-border: #FCA5A5;
            --text-dark: #0F172A;
            --text-muted: #475569;
            --text-light: #94A3B8;
            --bg-body: #F4F7F5;
            --bg-card: #FFFFFF;
            --border-subtle: #E2E8F0;
            --shadow-card: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 4px 8px rgba(0, 0, 0, 0.08);
            --radius-sm: 4px;
            --radius-md: 6px;
            --radius-lg: 8px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', 'Hind Siliguri', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-body);
            color: var(--text-dark);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Top Utility Bar */
        .top-gov-bar {
            background-color: #05261E;
            color: #E2E8F0;
            font-size: 0.82rem;
            padding: 7px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .top-gov-bar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gov-seal-info {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        .gov-seal-info .bd-flag {
            width: 18px;
            height: 12px;
            border-radius: 2px;
            object-fit: cover;
            display: inline-block;
        }

        .top-nav-right {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hotline-badge {
            background: rgba(217, 45, 32, 0.12);
            color: #FF6B6B;
            padding: 2px 10px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            font-size: 0.78rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid rgba(217, 45, 32, 0.35);
        }

        .top-nav-links a {
            color: #CBD5E1;
            text-decoration: none;
            transition: color 0.2s;
            font-size: 0.8rem;
        }

        .top-nav-links a:hover {
            color: var(--primary-emerald);
        }

        /* Main Header */
        .main-header {
            background: #FFFFFF;
            padding: 18px 0;
            border-bottom: 1px solid var(--border-subtle);
        }

        .main-header .header-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .brand-logo-group {
            display: flex;
            align-items: center;
            gap: 16px;
            text-decoration: none;
        }

        .brand-icon-box {
            width: 50px;
            height: 50px;
            background: var(--primary-dark);
            color: var(--primary-emerald);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            flex-shrink: 0;
            position: relative;
        }

        .brand-icon-box::after {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            width: 10px;
            height: 10px;
            background: var(--accent-red);
            border-radius: 50%;
            border: 2px solid #FFFFFF;
        }

        .brand-title-text h1 {
            margin: 0;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary-dark);
            letter-spacing: -0.01em;
            line-height: 1.25;
        }

        .brand-title-text span {
            display: block;
            font-size: 0.85rem;
            color: var(--primary-emerald);
            font-weight: 600;
            margin-top: 2px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .govt-tag-badge {
            background-color: var(--primary-mint);
            border: 1px solid rgba(0, 189, 139, 0.25);
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .govt-tag-badge i {
            color: var(--primary-dark);
            font-size: 1.2rem;
        }

        .govt-tag-text {
            font-size: 0.78rem;
            color: var(--primary-dark);
            font-weight: 700;
            line-height: 1.2;
        }

        /* Navigation Bar */
        .main-nav {
            background: var(--primary-dark);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(10, 76, 59, 0.15);
            border-bottom: 3px solid var(--primary-emerald);
        }

        .main-nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mobile-nav-toggle {
            display: none;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #FFFFFF;
            font-size: 1.1rem;
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-weight: 700;
        }

        .nav-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            gap: 2px;
            flex-wrap: wrap;
            white-space: nowrap;
            width: 100%;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 12px 10px;
            color: #FFFFFF;
            text-decoration: none;
            font-size: 0.84rem;
            font-weight: 600;
            transition: all 0.2s ease;
            opacity: 0.9;
            border-radius: var(--radius-sm);
        }

        .nav-link:hover {
            opacity: 1;
            background: rgba(255, 255, 255, 0.1);
            color: var(--primary-emerald);
        }

        .nav-item.active .nav-link {
            opacity: 1;
            color: #FFFFFF;
            background: rgba(0, 189, 139, 0.25);
            font-weight: 700;
        }

        .nav-item.active .nav-link i {
            color: var(--primary-emerald);
        }

        .nav-admin-btn {
            background: var(--primary-emerald) !important;
            color: #04241C !important;
            border-radius: var(--radius-sm);
            padding: 8px 16px !important;
            font-weight: 700 !important;
            margin-left: auto;
        }

        .nav-admin-btn:hover {
            background: #00d9a3 !important;
        }

        /* Notice Ticker Bar */
        .ticker-bar {
            background: #FFFFFF;
            border-bottom: 1px solid var(--border-subtle);
            padding: 10px 0;
        }

        .ticker-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
            overflow: hidden;
        }

        .ticker-label {
            background: var(--accent-red);
            color: #FFFFFF;
            padding: 5px 14px;
            border-radius: var(--radius-sm);
            font-size: 0.8rem;
            font-weight: 700;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ticker-content {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 0.88rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        .ticker-track {
            display: inline-flex;
            animation: ticker-scroll 30s linear infinite;
        }

        .ticker-track:hover {
            animation-play-state: paused;
        }

        .ticker-text {
            padding-right: 50px;
            white-space: nowrap;
        }

        @keyframes ticker-scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Page Banner */
        .page-title-banner {
            background: var(--primary-dark);
            color: #FFFFFF;
            padding: 35px 0;
            margin-bottom: 30px;
        }

        .page-title-banner h1 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 800;
        }

        .page-title-banner p {
            margin: 6px 0 0 0;
            opacity: 0.85;
            font-size: 0.95rem;
        }

        /* Card System */
        .card {
            background: var(--bg-card);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-card);
            padding: 22px;
            margin-bottom: 22px;
            border: 1px solid var(--border-subtle);
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            box-shadow: var(--shadow-hover);
            border-color: #CBD5E1;
        }

        .card-header-styled {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-subtle);
        }

        .card-header-styled h2, .card-header-styled h3 {
            margin: 0;
            color: var(--primary-dark);
            font-size: 1.15rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header-styled h2 i, .card-header-styled h3 i {
            color: var(--primary-emerald);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }

        .btn-primary, .btn-emerald {
            background: var(--primary-emerald);
            color: #04241C;
            font-weight: 700;
        }

        .btn-primary:hover, .btn-emerald:hover {
            background: var(--primary-emerald-hover);
        }

        .btn-dark {
            background: var(--primary-dark);
            color: #FFFFFF;
        }

        .btn-dark:hover {
            background: var(--primary-deep);
            color: var(--primary-emerald);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--border-subtle);
            color: var(--primary-dark);
        }

        .btn-outline:hover {
            background: var(--primary-mint);
            border-color: var(--primary-emerald);
        }

        /* Grid Utilities */
        .grid { display: grid; gap: 20px; }
        .grid-2 { grid-template-columns: repeat(2, 1fr); }
        .grid-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-4 { grid-template-columns: repeat(4, 1fr); }

        /* Responsive Breakpoints & Overrides */
        @media (max-width: 1024px) {
            .mobile-nav-toggle {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                margin: 8px 0;
            }

            .main-nav .container {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-list {
                display: none;
                flex-direction: column;
                width: 100%;
                padding: 10px 0;
                gap: 4px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .nav-list.is-open {
                display: flex;
            }

            .nav-link {
                width: 100%;
                padding: 10px 14px;
            }

            .nav-admin-btn {
                margin-left: 0;
                margin-top: 6px;
                text-align: center;
                justify-content: center;
            }

            .grid-3, .grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .top-gov-bar .container {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .main-header .header-wrapper {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .brand-title-text h1 {
                font-size: 1.1rem;
            }

            .govt-tag-badge {
                width: 100%;
            }

            .grid-2, .grid-3, .grid-4 {
                grid-template-columns: 1fr;
            }

            .page-title-banner {
                padding: 25px 0;
            }

            .page-title-banner h1 {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 14px;
            }

            .card {
                padding: 16px;
            }

            .ticker-label {
                font-size: 0.75rem;
                padding: 4px 10px;
            }
        }

        /* Employee Cards */
        .employee-card {
            text-align: center;
            padding: 20px 14px;
        }

        .employee-photo-wrapper {
            position: relative;
            width: 110px;
            height: 110px;
            margin: 0 auto 12px;
        }

        img.employee-photo {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--primary-emerald);
        }

        /* Footer */
        footer {
            background: var(--primary-dark);
            color: #CBD5E1;
            padding: 45px 0 20px;
            margin-top: 45px;
            border-top: 4px solid var(--primary-emerald);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-col h4 {
            color: #FFFFFF;
            font-size: 1rem;
            font-weight: 700;
            margin: 0 0 14px 0;
            padding-bottom: 6px;
            border-bottom: 2px solid var(--primary-emerald);
            display: inline-block;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 8px;
        }

        .footer-links a {
            color: #94A3B8;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-links a:hover {
            color: var(--primary-emerald);
        }

        .visitor-counter-box {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(0, 189, 139, 0.25);
            padding: 12px;
            border-radius: var(--radius-sm);
            text-align: center;
            margin-top: 12px;
        }

        .visitor-counter-box span {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--primary-emerald);
            letter-spacing: 1px;
            display: block;
        }

        .footer-bottom {
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            font-size: 0.82rem;
            color: #64748B;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Top Government Utility Bar -->
    <div class="top-gov-bar">
        <div class="container">
            <div class="gov-seal-info">
                <svg class="bd-flag" viewBox="0 0 600 360" width="18" height="12">
                    <rect width="600" height="360" fill="#006a4e"/>
                    <circle cx="270" cy="180" r="120" fill="#f42a41"/>
                </svg>
                <span>{{ __('Government of the People\'s Republic of Bangladesh') }}</span>
            </div>
            <div class="top-nav-right">
                <div class="hotline-badge">
                    <i class="fa-solid fa-phone"></i>
                    <span>{{ __('Hotline: 333 / 16524') }}</span>
                </div>
                <div class="top-nav-links">
                    @if(app()->getLocale() == 'bn')
                        <a href="{{ route('lang.switch', 'en') }}" style="background: rgba(255,255,255,0.15); padding: 3px 8px; border-radius: 4px; font-weight: 700; color: var(--primary-emerald);"><i class="fa-solid fa-globe"></i> English</a>
                    @else
                        <a href="{{ route('lang.switch', 'bn') }}" style="background: rgba(255,255,255,0.15); padding: 3px 8px; border-radius: 4px; font-weight: 700; color: var(--primary-emerald);"><i class="fa-solid fa-globe"></i> বাংলা</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <div class="container">
            <div class="header-wrapper">
                <a href="{{ route('home') }}" class="brand-logo-group">
                    <div class="brand-icon-box">
                        <i class="fa-solid fa-atom"></i>
                    </div>
                    <div class="brand-title-text">
                        <h1>{{ __('National Institute of Research, Science & Technology') }}</h1>
                        <span>{{ __('NIRST Regional Research Center') }}</span>
                    </div>
                </a>
                <div class="header-actions">
                    <div class="govt-tag-badge">
                        <i class="fa-solid fa-flask"></i>
                        <div class="govt-tag-text">
                            <div>{{ __('Scientific Research & Innovation') }}</div>
                            <div style="font-weight: 500; opacity: 0.8; font-size: 0.72rem;">Ministry of Science & Tech</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Bar with Mobile Toggle -->
    <nav class="main-nav" x-data="{ mobileOpen: false }">
        <div class="container">
            <button type="button" class="mobile-nav-toggle" @click="mobileOpen = !mobileOpen">
                <i class="fa-solid" :class="mobileOpen ? 'fa-xmark' : 'fa-bars'"></i>
                <span>Menu</span>
            </button>

            <ul class="nav-list" :class="{ 'is-open': mobileOpen }">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> {{ __('Home') }}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('departments.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('departments.index') }}"><i class="fa-solid fa-building-columns"></i> {{ __('Departments') }}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('employees.index') }}"><i class="fa-solid fa-users"></i> {{ __('Employees') }}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('scientists.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('scientists.index') }}"><i class="fa-solid fa-user-astronaut"></i> {{ __('Scientists') }}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('research.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('research.index') }}"><i class="fa-solid fa-microscope"></i> {{ __('Research') }}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('news.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('news.index') }}"><i class="fa-solid fa-newspaper"></i> {{ __('News') }}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('notices.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('notices.index') }}"><i class="fa-solid fa-bullhorn"></i> {{ __('Notices') }}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('gallery.index') }}"><i class="fa-solid fa-images"></i> {{ __('Gallery') }}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact.create') }}"><i class="fa-solid fa-envelope"></i> {{ __('Contact') }}</a>
                </li>
                @auth('admin')
                    <li class="nav-item">
                        <a class="nav-link nav-admin-btn" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge-high"></i> {{ __('Admin Panel') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link nav-admin-btn" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> {{ __('Login') }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Notice Ticker Bar -->
    <div class="ticker-bar">
        <div class="container">
            <div class="ticker-wrapper">
                <div class="ticker-label">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span>{{ __('Notice Board') }}</span>
                </div>
                <div class="ticker-content">
                    <div class="ticker-track">
                        <span class="ticker-text">welcome to NIRST &bull; {{ __('Scientific Research & Innovation') }} &bull; Advanced Structure-Based Drug Design Workshop Completed &bull; National E-Tender Submissions Open 2026</span>
                        <span class="ticker-text">welcome to NIRST &bull; {{ __('Scientific Research & Innovation') }} &bull; Advanced Structure-Based Drug Design Workshop Completed &bull; National E-Tender Submissions Open 2026</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check" style="font-size: 1.2rem; color: var(--primary-emerald);"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <!-- Government Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>NIRST</h4>
                    <p style="font-size: 0.85rem; line-height: 1.6; color: #94A3B8;">
                        National Institute of Research, Science & Technology (NIRST) is dedicated to industrial research and scientific technological development for Bangladesh.
                    </p>
                    <div style="margin-top: 12px; color: var(--primary-emerald); font-weight: 600; font-size: 0.85rem;">
                        <i class="fa-solid fa-location-dot"></i> Dhaka, Bangladesh
                    </div>
                </div>

                <div class="footer-col">
                    <h4>{{ __('Quick Links') }}</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="fa-solid fa-angle-right"></i> {{ __('Home') }}</a></li>
                        <li><a href="{{ route('departments.index') }}"><i class="fa-solid fa-angle-right"></i> {{ __('Departments') }}</a></li>
                        <li><a href="{{ route('scientists.index') }}"><i class="fa-solid fa-angle-right"></i> {{ __('Scientists') }}</a></li>
                        <li><a href="{{ route('notices.index') }}"><i class="fa-solid fa-angle-right"></i> {{ __('Notices') }}</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>National Portals</h4>
                    <ul class="footer-links">
                        <li><a href="https://bangladesh.gov.bd" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i> Bangladesh National Portal</a></li>
                        <li><a href="https://most.gov.bd" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i> Ministry of Science & Tech</a></li>
                        <li><a href="https://mygov.bd" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i> MyGov Service Portal</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Visitor Info</h4>
                    <p style="font-size: 0.85rem; color: #94A3B8;">Total Portal Access Counter</p>
                    <div class="visitor-counter-box">
                        <span>1,84,920</span>
                        <small style="color: #94A3B8; font-size: 0.75rem;">Verified Visits</small>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ __('National Institute of Research, Science & Technology') }}. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
