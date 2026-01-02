@extends('layouts.app')

@section('title', 'Services')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Services</h2>
    <a href="{{ route('services.create') }}" class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Service
    </a>
</div>
<p class="text-muted mb-4">Manage services offering and pricing</p>

<div class="card p-4">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Service Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->category }}</td>
                    <td>${{ number_format($service->price, 2) }}</td>
                    <td>{{ $service->duration ?? '-' }}</td>
                    <td>
                        @if($service->status === 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('services.edit', $service->id) }}">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item text-danger">
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
                    <td colspan="6" class="text-center">No services found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
