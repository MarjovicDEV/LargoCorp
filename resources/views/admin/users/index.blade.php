@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: var(--bs-dark); font-size: 28px; margin: 0; font-weight: 600;">
        User Management
    </h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">
        + Add New User
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card" style="border: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead style="background-color: #f8f9fa; border-bottom: 1px solid var(--bs-line-light);">
                <tr>
                    <th style="color: #999; font-weight: 600; padding: 15px;">Email</th>
                    <th style="color: #999; font-weight: 600; padding: 15px;">Role</th>
                    <th style="color: #999; font-weight: 600; padding: 15px;">Status</th>
                    <th style="color: #999; font-weight: 600; padding: 15px;">Created</th>
                    <th style="color: #999; font-weight: 600; padding: 15px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td style="padding: 15px;">{{ $user->email }}</td>
                        <td style="padding: 15px;">
                            <span class="badge" style="background-color: var(--bs-primary); color: white; padding: 6px 12px; border-radius: 4px;">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td style="padding: 15px;">
                            @if ($user->status)
                                <span class="badge" style="background-color: #28a745; color: white; padding: 6px 12px; border-radius: 4px;">
                                    Active
                                </span>
                            @else
                                <span class="badge" style="background-color: #6c757d; color: white; padding: 6px 12px; border-radius: 4px;">
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td style="padding: 15px;">{{ $user->created_at->format('M d, Y') }}</td>
                        <td style="padding: 15px;">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form method="POST" action="{{ route('users.destroy', $user) }}" style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 30px; color: #999;">
                            No users found. <a href="{{ route('users.create') }}">Create one</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div style="margin-top: 20px;">
    {{ $users->links() }}
</div>
@endsection
