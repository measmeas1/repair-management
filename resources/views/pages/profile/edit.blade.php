@extends('layouts.app')

@section('title', 'Edit Profile')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<style>
    .profile-card { border-radius: 14px; box-shadow: 0 6px 18px rgba(0,0,0,0.08); }
    .profile-avatar { width: 90px; height: 90px; border-radius: 50%; overflow: hidden; background:#ddd; }
    .profile-avatar-img { width: 100%; height: 100%; object-fit: cover; }
    .info-label { font-size: 14px; color: #888; margin-bottom: 2px; }
    .info-value input { width: 100%; padding: 6px 12px; border-radius: 6px; border: 1px solid #ccc; }
</style>
@endpush

@section('content')
@php $user = auth()->user(); @endphp

<div class="profile-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Edit Profile</h2>
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Back</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card profile-card mb-4 p-4">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Avatar --}}
            <div class="d-flex align-items-center mb-4 gap-4">
                <div class="profile-avatar">
                    @if($user->image)
                        <img src="{{ asset('storage/avatars/'.$user->image) }}" alt="Avatar" class="profile-avatar-img">
                    @else
                        <div class="d-flex justify-content-center align-items-center w-100 h-100 bg-secondary text-white">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div>
                    <label class="fw-semibold mb-1">Change Avatar</label>
                    <input type="file" name="image" class="form-control">
                    @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Profile Fields --}}
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="info-label">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="info-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="info-label">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                    @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="info-label">Place</label>
                    <input type="text" name="place" value="{{ old('place', $user->place) }}" class="form-control">
                    @error('place') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="info-label">Role</label>
                    <input type="text" value="{{ $user->role ?? 'Staff' }}" class="form-control" disabled>
                </div>

                <div class="col-md-6">
                    <label class="info-label">Account Status</label>
                    <input type="text" value="{{ ucfirst($user->status ?? 'active') }}" class="form-control" disabled>
                </div>
            </div>

            {{-- Change Password --}}
            <hr class="my-4">
            <h5 class="fw-bold mb-3">Change Password</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="info-label">Current Password</label>
                    <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required>
                    @error('current_password') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
            
                <div class="col-md-6">
                    <label class="info-label">New Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter new password">
                    @error('password') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
            
                <div class="col-md-6">
                    <label class="info-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                </div>
            </div>
            
            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
