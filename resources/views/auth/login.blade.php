@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container" style="padding-top:40px;">
        <div style="max-width:400px;margin:0 auto;">
            <div class="card">
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <div style="margin-bottom:15px;">
                        <label for="email" style="display:block;margin-bottom:5px;">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', 'admin@nirst.gov.bd') }}" required autofocus style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">
                        @error('email') <small style="color:#e74c3c;">{{ $message }}</small> @enderror
                    </div>

                    <div style="margin-bottom:15px;">
                        <label for="password" style="display:block;margin-bottom:5px;">Password</label>
                        <input type="password" id="password" name="password" required value="password" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">
                        @error('password') <small style="color:#e74c3c;">{{ $message }}</small> @enderror
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
                </form>

                <div style="margin-top:15px;text-align:center;">
                    <button onclick="fillCredentials()" class="btn btn-outline" style="width:100%;">
                        <i class="fa-solid fa-bolt" style="margin-right:5px;"></i> One-Click Login (Demo)
                    </button>
                </div>
            </div>

            <div class="card" style="margin-top:15px;padding:15px;background:#f8f9fa;border:1px solid #e2e8f0;border-radius:var(--radius-sm);">
                <h5 style="margin:0 0 10px;font-size:0.85rem;text-transform:uppercase;color:#6c757d;font-weight:700;"><i class="fa-solid fa-key" style="color:var(--primary-emerald);"></i> Demo Credentials</h5>
                <div style="margin-bottom:8px;font-size:0.9rem;">
                    <strong>Email:</strong>
                    <code style="background:#e9ecef;padding:3px 8px;border-radius:4px;color:#0A4C3B;font-weight:600;">admin@nirst.gov.bd</code>
                </div>
                <div style="font-size:0.9rem;">
                    <strong>Password:</strong>
                    <code style="background:#e9ecef;padding:3px 8px;border-radius:4px;color:#D92D20;font-weight:600;">password</code>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fillCredentials() {
            document.getElementById('email').value = 'admin@nirst.gov.bd';
            document.getElementById('password').value = 'password';
            document.getElementById('loginForm').submit();
        }
    </script>
@endsection
