@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Customer Management</h2>

    <a href="{{ route('customers.create') }}" class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Customer
    </a>
</div>

<p class="text-muted mb-4">Manage customers</p>

<div class="card p-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Location</th>
                <th>Address</th>
                <th>Total Repair</th>
                <th>Date</th>
                <th>Update</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->location ?? 'N/A' }}</td>
                <td>{{ $customer->address ?? 'N/A' }}</td>
                <td>${{ number_format($customer->total_repair, 2) }}</td>
                <td>{{ $customer->created_at->format('d, M Y') }}</td>
                <td>{{ $customer->updated_at->format('d, M Y') }}</td>
                <td class="text-center">
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('customers.edit', $customer->id) }}">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                      onsubmit="return confirm('Delete this customer?')">
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
                <td colspan="7" class="text-center text-muted">No customers found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

{{-- Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
