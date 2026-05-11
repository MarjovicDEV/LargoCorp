@extends('layouts.auth')

@section('title', 'Admin Login')

@section('content')
<div class="auth-container">
    <div class="auth-header">
        <h1>LargoCorp Admin</h1>
        <p>Sign in to manage your store</p>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            {{ $errors->first('email') ?? 'Login failed. Please try again.' }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="email" class="form-label">
                Email Address
            </label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                value="{{ old('email') }}"
                placeholder="admin@example.com"
                required
                autofocus
            >
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="password" class="form-label">
                Password
            </label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                placeholder="••••••••"
                required
            >
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary w-100">
            Sign In
        </button>
    </form>
    
    <div class="auth-divider">
        <div class="auth-divider-title">Demo Credentials</div>
        <div class="auth-divider-content">
            <p>Email: <code>test@example.com</code></p>
            <p>Password: <code>admin123</code></p>
        </div>
    </div>
    
    <div class="auth-footer">
        <a href="/shop/search">← Back to Shop</a>
    </div>
</div>
@endsection
