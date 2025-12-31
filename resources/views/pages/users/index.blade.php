@extends('layouts.app')

@section('title', 'Staff')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Staff Management</h2>

    <a href="{{ route('users.create') }}" class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Staff
    </a>
</div>
<p class="text-muted mb-4">Manage admin and staff members</p>

<div class="card p-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Place</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->place }}</td>
                <td>
                    @if($user->gender === 'male')
                        <span class="badge bg-primary">M</span>
                    @elseif($user->gender === 'female')
                        <span class="badge bg-danger">F</span>
                    @else
                        <span class="badge bg-secondary">N/A</span>
                    @endif
                </td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    @if($user->status === 'active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>{{ $user->created_at->format('d, M Y') }}</td>
                <td class="text-center">
                    <div class="dropdown">
                        <a href="#" class="text-dark" id="dropdownMenuButton{{ $user->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $user->id }}">
                            <li>
                                <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
                
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No staff found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
