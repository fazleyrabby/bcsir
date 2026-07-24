@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <div class="page-title">
        <div class="container">
            <h1>Admin Login</h1>
        </div>
    </div>

    <div class="container">
        <div style="max-width:400px;margin:0 auto;">
            <div class="card">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div style="margin-bottom:15px;">
                        <label for="email" style="display:block;margin-bottom:5px;">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">
                        @error('email') <small style="color:#e74c3c;">{{ $message }}</small> @enderror
                    </div>

                    <div style="margin-bottom:15px;">
                        <label for="password" style="display:block;margin-bottom:5px;">Password</label>
                        <input type="password" id="password" name="password" required style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">
                        @error('password') <small style="color:#e74c3c;">{{ $message }}</small> @enderror
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
                </form>
            </div>

            <div class="card" style="margin-top:15px;padding:15px;background:#f8f9fa;">
                <h5 style="margin:0 0 10px;font-size:0.85rem;text-transform:uppercase;color:#6c757d;">Demo Credentials</h5>
                <div style="margin-bottom:5px;">
                    <strong>Email:</strong>
                    <code style="background:#e9ecef;padding:2px 6px;border-radius:3px;">admin@bcsir.gov.bd</code>
                </div>
                <div>
                    <strong>Password:</strong>
                    <code style="background:#e9ecef;padding:2px 6px;border-radius:3px;">admin123</code>
                </div>
            </div>
        </div>
    </div>
@endsection
