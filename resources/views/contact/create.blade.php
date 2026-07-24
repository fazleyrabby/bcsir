@extends('layouts.app')

@section('title', __('Contact & Feedback') . ' - NIRST')

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-envelope-open-text" style="color: var(--primary-emerald);"></i> {{ __('Contact & Feedback') }}</h1>
            <p>{{ __('Get in touch with National Institute of Research, Science & Technology (NIRST)') }}</p>
        </div>
    </div>

    <div class="container">
        <div class="grid grid-2">
            <!-- Contact Details Card -->
            <div class="card">
                <div class="card-header-styled">
                    <h2><i class="fa-solid fa-location-dot"></i> Office Address</h2>
                </div>
                <div style="font-size: 0.95rem; line-height: 1.8; color: var(--text-dark);">
                    <h3 style="margin: 0 0 10px 0; color: var(--primary-dark);">National Institute of Research, Science & Technology (NIRST)</h3>
                    <p style="margin-bottom: 20px; color: var(--text-muted);">
                        Agargaon, Sher-e-Bangla Nagar, Dhaka-1207, Bangladesh
                    </p>

                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--bg-body); border-radius: var(--radius-sm);">
                            <i class="fa-solid fa-phone" style="font-size: 1.2rem; color: var(--primary-emerald);"></i>
                            <div>
                                <strong style="display: block; font-size: 0.78rem; color: var(--text-muted);">PHONE ENQUIRIES</strong>
                                <span>+880-2-9876543 / +880-2-9876544</span>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--bg-body); border-radius: var(--radius-sm);">
                            <i class="fa-solid fa-envelope" style="font-size: 1.2rem; color: var(--primary-emerald);"></i>
                            <div>
                                <strong style="display: block; font-size: 0.78rem; color: var(--text-muted);">OFFICIAL EMAIL</strong>
                                <span>info@nirst.gov.bd</span>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--bg-body); border-radius: var(--radius-sm);">
                            <i class="fa-solid fa-clock" style="font-size: 1.2rem; color: var(--primary-emerald);"></i>
                            <div>
                                <strong style="display: block; font-size: 0.78rem; color: var(--text-muted);">OFFICE HOURS</strong>
                                <span>Sunday - Thursday (9:00 AM - 5:00 PM)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card">
                <div class="card-header-styled">
                    <h2><i class="fa-solid fa-paper-plane"></i> Send Official Inquiry</h2>
                </div>
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div style="margin-bottom: 16px;">
                        <label for="name" style="display: block; font-weight: 700; font-size: 0.88rem; margin-bottom: 6px; color: var(--primary-dark);">Your Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); font-size: 0.9rem; font-family: inherit; background: var(--bg-body);">
                        @error('name') <small style="color:#e74c3c; font-weight:600;">{{ $message }}</small> @enderror
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label for="email" style="display: block; font-weight: 700; font-size: 0.88rem; margin-bottom: 6px; color: var(--primary-dark);">Email Address *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); font-size: 0.9rem; font-family: inherit; background: var(--bg-body);">
                        @error('email') <small style="color:#e74c3c; font-weight:600;">{{ $message }}</small> @enderror
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label for="subject" style="display: block; font-weight: 700; font-size: 0.88rem; margin-bottom: 6px; color: var(--primary-dark);">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" style="width: 100%; padding: 10px 12px; border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); font-size: 0.9rem; font-family: inherit; background: var(--bg-body);">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label for="message" style="display: block; font-weight: 700; font-size: 0.88rem; margin-bottom: 6px; color: var(--primary-dark);">Message Content *</label>
                        <textarea id="message" name="message" rows="5" required style="width: 100%; padding: 10px 12px; border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); font-size: 0.9rem; font-family: inherit; background: var(--bg-body);">{{ old('message') }}</textarea>
                        @error('message') <small style="color:#e74c3c; font-weight:600;">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-emerald" style="width: 100%; padding: 12px; font-size: 0.95rem;">
                        <i class="fa-solid fa-paper-plane"></i> Submit Message
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
