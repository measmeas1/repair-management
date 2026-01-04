@extends('layouts.app')

@section('title', 'Profile')

@section('content')
@php
    $user = auth()->user();
@endphp

<div class="profile-page">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Profile</h2>
    </div>
    <p class="text-muted mb-4">Manage your account information</p>

    {{-- Profile Card --}}
    <div class="card profile-card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-4">
                {{-- Avatar --}}
                <div class="profile-avatar">
                    @if($user->image)
                    <img src="{{ asset('storage/avatars/'.$user->image) }}" alt="Profile" class="profile-avatar-img">
                    @else
                        <div class="profile-avatar">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <div>
                    <div class="profile-name">{{ $user->name }}</div>
                    <div class="profile-role">
                        {{ $user->role ?? 'Staff' }}
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('profile.edit') }}" class="btn-edit mb-2">
                    <i class="bi bi-pencil"></i> Edit
                </a>

                <div class="mt-3">
                    <div class="text-muted small">
                        Joined {{ $user->created_at->format('d M Y') }}
                    </div>
                    
                    <span class="badge-active mt-2 d-inline-block">
                        {{ ucfirst($user->status ?? 'active') }}
                    </span>
                </div>
            </div>

        </div>
    </div>

    {{-- Personal Information --}}
    <div class="card profile-card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Personal Information</h5>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="info-label">Full Name</div>
                    <div class="info-value">{{ $user->name }}</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $user->email }}</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">Phone</div>
                    <div class="info-value">{{ $user->phone ?? '-' }}</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">Place</div>
                    <div class="info-value">{{ $user->place ?? '-' }}</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">Role</div>
                    <div class="info-value">{{ $user->role ?? 'Staff' }}</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">Account Status</div>
                    <div class="info-value text-success fw-semibold">
                        {{ ucfirst($user->status ?? 'active') }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
