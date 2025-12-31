@extends('layouts.app')

@section('title', 'Edit Staff')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Edit Staff: {{ $user->name }}</h3>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="" {{ is_null($user->gender) ? 'selected' : '' }}>Select</option>
                <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Place</label>
            <select name="place" class="form-control" required>
                <option value="">Select Province/City</option>
                <option value="Phnom Penh" {{ $user->place === 'Phnom Penh' ? 'selected' : '' }}>Phnom Penh</option>
                <option value="Kandal" {{ $user->place === 'Kandal' ? 'selected' : '' }}>Kandal</option>
                <option value="Takeo" {{ $user->place === 'Takeo' ? 'selected' : '' }}>Takeo</option>
                <option value="Battambang" {{ $user->place === 'Battambang' ? 'selected' : '' }}>Battambang</option>
                <option value="Siem Reap" {{ $user->place === 'Siem Reap' ? 'selected' : '' }}>Siem Reap</option>
                <option value="Sihanoukville" {{ $user->place === 'Sihanoukville' ? 'selected' : '' }}>Sihanoukville</option>
                <option value="Kampong Cham" {{ $user->place === 'Kampong Cham' ? 'selected' : '' }}>Kampong Cham</option>
                <option value="Kampong Speu" {{ $user->place === 'Kampong Speu' ? 'selected' : '' }}>Kampong Speu</option>
                <option value="Prey Veng" {{ $user->place === 'Prey Veng' ? 'selected' : '' }}>Prey Veng</option>
                <option value="Kampot" {{ $user->place === 'Kampot' ? 'selected' : '' }}>Kampot</option>
                <option value="Kampong Chhang" {{ $user->place === 'Kampong Chhang' ? 'selected' : '' }}>Kampong Chhang</option>
                <!-- Add more provinces if needed -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Staff</button>
    </form>
</div>
@endsection
