@extends('layouts.admin')

@section('content')
<h2 style="color: var(--bs-dark); font-size: 28px; margin-bottom: 25px; font-weight: 600;">
    Create New User
</h2>

<div class="card" style="border: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); max-width: 600px;">
    <div class="card-body" style="padding: 30px;">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    value="{{ old('email') }}"
                    placeholder="admin@example.com"
                    required
                >
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
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
                <small style="color: #999;">Minimum 8 characters</small>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    class="form-control"
                    placeholder="••••••••"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select 
                    id="role" 
                    name="role" 
                    class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}"
                    required
                >
                    <option value="">Select a role</option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="manager" {{ old('role') === 'manager' ? 'selected' : '' }}>Manager</option>
                    <option value="guest" {{ old('role') === 'guest' ? 'selected' : '' }}>Guest</option>
                </select>
                @error('role')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <div class="form-check form-switch">
                    <input 
                        type="hidden"
                        name="status"
                        value="0"
                    >
                    <input 
                        type="checkbox" 
                        id="status" 
                        name="status" 
                        class="form-check-input" 
                        value="1"
                        {{ old('status', true) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="status">
                        Active
                    </label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Create User
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
