@extends('layouts.admin')

@section('content')
<h2 style="color: var(--bs-dark); font-size: 28px; margin-bottom: 25px; font-weight: 600;">
    Store Settings
</h2>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')

    <!-- General Section -->
    <div class="card mb-4" style="border: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid var(--bs-line-light); padding: 15px 20px;">
            <h5 style="margin: 0; color: var(--bs-dark); font-weight: 600;">General Settings</h5>
        </div>
        <div class="card-body" style="padding: 20px;">
            <div class="mb-3">
                <label for="store_name" class="form-label">Store Name</label>
                <input 
                    type="text" 
                    id="store_name" 
                    name="store_name" 
                    class="form-control {{ $errors->has('store_name') ? 'is-invalid' : '' }}"
                    value="{{ old('store_name', $settings['store_name']) }}"
                    required
                >
                @error('store_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="store_url" class="form-label">Store URL</label>
                <input 
                    type="url" 
                    id="store_url" 
                    name="store_url" 
                    class="form-control {{ $errors->has('store_url') ? 'is-invalid' : '' }}"
                    value="{{ old('store_url', $settings['store_url']) }}"
                    placeholder="https://example.com"
                    required
                >
                @error('store_url')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="admin_email" class="form-label">Admin Email</label>
                <input 
                    type="email" 
                    id="admin_email" 
                    name="admin_email" 
                    class="form-control {{ $errors->has('admin_email') ? 'is-invalid' : '' }}"
                    value="{{ old('admin_email', $settings['admin_email']) }}"
                    required
                >
                @error('admin_email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Email Configuration Section -->
    <div class="card mb-4" style="border: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid var(--bs-line-light); padding: 15px 20px;">
            <h5 style="margin: 0; color: var(--bs-dark); font-weight: 600;">Email Configuration</h5>
        </div>
        <div class="card-body" style="padding: 20px;">
            <div class="mb-3">
                <label for="smtp_host" class="form-label">SMTP Host</label>
                <input 
                    type="text" 
                    id="smtp_host" 
                    name="smtp_host" 
                    class="form-control"
                    value="{{ old('smtp_host', $settings['smtp_host']) }}"
                    placeholder="smtp.mailtrap.io"
                >
            </div>

            <div class="mb-3">
                <label for="smtp_port" class="form-label">SMTP Port</label>
                <input 
                    type="number" 
                    id="smtp_port" 
                    name="smtp_port" 
                    class="form-control"
                    value="{{ old('smtp_port', $settings['smtp_port']) }}"
                    placeholder="2525"
                >
            </div>

            <div class="mb-3">
                <label for="smtp_username" class="form-label">SMTP Username</label>
                <input 
                    type="text" 
                    id="smtp_username" 
                    name="smtp_username" 
                    class="form-control"
                    value="{{ old('smtp_username', $settings['smtp_username']) }}"
                >
            </div>

            <div class="mb-3">
                <label for="smtp_password" class="form-label">SMTP Password</label>
                <input 
                    type="password" 
                    id="smtp_password" 
                    name="smtp_password" 
                    class="form-control"
                    value="{{ old('smtp_password', $settings['smtp_password']) }}"
                    placeholder="Leave blank to keep current"
                >
            </div>

            <div class="mb-3">
                <label for="from_address" class="form-label">From Address (Email)</label>
                <input 
                    type="email" 
                    id="from_address" 
                    name="from_address" 
                    class="form-control {{ $errors->has('from_address') ? 'is-invalid' : '' }}"
                    value="{{ old('from_address', $settings['from_address']) }}"
                    placeholder="noreply@example.com"
                    required
                >
                @error('from_address')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="from_name" class="form-label">From Name</label>
                <input 
                    type="text" 
                    id="from_name" 
                    name="from_name" 
                    class="form-control {{ $errors->has('from_name') ? 'is-invalid' : '' }}"
                    value="{{ old('from_name', $settings['from_name']) }}"
                    placeholder="Your Store Name"
                    required
                >
                @error('from_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Localization Section -->
    <div class="card mb-4" style="border: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid var(--bs-line-light); padding: 15px 20px;">
            <h5 style="margin: 0; color: var(--bs-dark); font-weight: 600;">Localization</h5>
        </div>
        <div class="card-body" style="padding: 20px;">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="default_language" class="form-label">Default Language</label>
                    <select 
                        id="default_language" 
                        name="default_language" 
                        class="form-control {{ $errors->has('default_language') ? 'is-invalid' : '' }}"
                        required
                    >
                        <option value="en" {{ old('default_language', $settings['default_language']) === 'en' ? 'selected' : '' }}>English</option>
                        <option value="de" {{ old('default_language', $settings['default_language']) === 'de' ? 'selected' : '' }}>Deutsch</option>
                        <option value="fr" {{ old('default_language', $settings['default_language']) === 'fr' ? 'selected' : '' }}>Français</option>
                        <option value="es" {{ old('default_language', $settings['default_language']) === 'es' ? 'selected' : '' }}>Español</option>
                    </select>
                    @error('default_language')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="default_currency" class="form-label">Default Currency</label>
                    <select 
                        id="default_currency" 
                        name="default_currency" 
                        class="form-control {{ $errors->has('default_currency') ? 'is-invalid' : '' }}"
                        required
                    >
                        <option value="USD" {{ old('default_currency', $settings['default_currency']) === 'USD' ? 'selected' : '' }}>USD ($)</option>
                        <option value="EUR" {{ old('default_currency', $settings['default_currency']) === 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                        <option value="GBP" {{ old('default_currency', $settings['default_currency']) === 'GBP' ? 'selected' : '' }}>GBP (£)</option>
                        <option value="CHF" {{ old('default_currency', $settings['default_currency']) === 'CHF' ? 'selected' : '' }}>CHF (Fr.)</option>
                    </select>
                    @error('default_currency')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            Save Settings
        </button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection
