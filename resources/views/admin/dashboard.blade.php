@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-dark mb-1 fs-3">Dashboard</h2>
    <p class="text-muted mb-0">Welcome back, {{ $user->email ?? 'Admin' }}</p>
</div>

<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-body p-4">
        <h4 class="fw-bold text-dark mb-2">Welcome to LargoCorp Admin</h4>
        <p class="text-secondary mb-0 text-muted" style="line-height: 1.6;">
            You are successfully logged in. This is your admin dashboard where you can manage your e-commerce store powered by Aimeos.
        </p>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        @include('admin.components.stat-card', [
            'label' => 'Total Products',
            'value' => $productCount ?? 0,
        ])
    </div>
    <div class="col-md-4">
        @include('admin.components.stat-card', [
            'label' => 'Total Orders',
            'value' => $orderCount ?? 0,
        ])
    </div>
    <div class="col-md-4">
        @include('admin.components.stat-card', [
            'label' => 'Total Categories',
            'value' => $categoryCount ?? 0,
        ])
    </div>
</div>

<div class="d-flex gap-3 mt-2">
    <a href="{{ route('aimeos_shop_jqadm_search', ['site' => 'default', 'resource' => 'dashboard']) }}" target="_blank" class="btn btn-primary px-4 py-2 fw-medium shadow-sm d-flex align-items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M4.5 13a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V4h1.25a.75.75 0 0 0 0-1.5H13V2a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v.5H3.75a.75.75 0 0 0 0 1.5H5v9z"/>
        </svg>
        Go to Aimeos Admin
    </a>
    <a href="{{ route('aimeos_shop_list') }}" class="btn btn-outline-secondary px-4 py-2 fw-medium shadow-sm d-flex align-items-center gap-2 bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M1 1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
        </svg>
        View Shop
    </a>
</div>
@endsection
