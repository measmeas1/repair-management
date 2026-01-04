@extends('layouts.app')

@section('title', 'Edit Profile')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<div class="profile-page">

    <h2 class="fw-bold mb-4">Edit Profile</h2>

    <div class="card profile-card">
        <div class="card-body">

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Avatar --}}
                <div class="mb-4">
                    <label class="info-label">Profile Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="info-label">Name</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="info-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="info-label">Phone</label>
                        <input type="text" name="phone" class="form-control"
                               value="{{ old('phone', $user->phone) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="info-label">Place</label>
                        <input type="text" name="place" class="form-control"
                               value="{{ old('place', $user->place) }}">
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button class="btn btn-dark px-4">Save</button>
                    <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
