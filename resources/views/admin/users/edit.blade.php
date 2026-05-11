@extends('layouts.admin')

@section('content')
<h2 style="color: var(--bs-dark); font-size: 28px; margin-bottom: 25px; font-weight: 600;">
    Edit User
</h2>

<div class="card" style="border: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); max-width: 600px;">
    <div class="card-body" style="padding: 30px;">
        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    value="{{ old('email', $user->email) }}"
                    placeholder="admin@example.com"
                    required
                >
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password (Leave blank to keep current)</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    placeholder="••••••••"
                >
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <small style="color: #999;">Minimum 8 characters if changing password</small>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    class="form-control"
                    placeholder="••••••••"
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
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="manager" {{ old('role', $user->role) === 'manager' ? 'selected' : '' }}>Manager</option>
                    <option value="guest" {{ old('role', $user->role) === 'guest' ? 'selected' : '' }}>Guest</option>
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
                        {{ old('status', $user->status) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="status">
                        Active
                    </label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Update User
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
                <form method="POST" action="{{ route('users.destroy', $user) }}" style="display: inline;" onsubmit="return confirm('Are you sure? This cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Delete User
                    </button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection
