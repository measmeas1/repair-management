@extends('layouts.app')

@section('title', 'Add Staff')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Add New Staff/Admin</h3>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
    

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" selected>Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Place</label>
            <select name="place" class="form-control" required>
                <option value="">Select Province/City</option>
                <option value="Phnom Penh">Phnom Penh</option>
                <option value="Kandal">Kandal</option>
                <option value="Takeo">Takeo</option>
                <option value="Battambang">Battambang</option>
                <option value="Siem Reap">Siem Reap</option>
                <option value="Sihanoukville">Sihanoukville</option>
                <option value="Kampong Cham">Kampong Cham</option>
                <option value="Kampong Speu">Kampong Speu</option>
                <option value="Prey Veng">Prey Veng</option>
                <option value="Kampot">Kampot</option>
                <option value="Kampong Chhang">Kampong Chhang</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Staff</button>
    </form>
</div>
@endsection
