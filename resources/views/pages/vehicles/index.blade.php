@extends('layouts.app')

@section('title', 'Vehicles')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Vehicle Management</h2>
    <a href="{{ route('vehicles.create') }}" class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Vehicle
    </a>
</div>
<p class="text-muted mb-4">Track all vehicles and service</p>

<div class="card p-4">
    <table class="table align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Name Car</th>
                <th>Model</th>
                <th>Year</th>
                <th>Plate Number</th>
                <th>Create</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->customer->name }}</td>
                <td>{{ $vehicle->name }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->year ?? '-' }}</td>
                <td>{{ $vehicle->plate_number }}</td>
                <td>{{ $vehicle->created_at->format('d, M Y') }}</td>
                <td class="text-center">
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('vehicles.edit', $vehicle->id) }}">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST"
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
            <tr><td colspan="6" class="text-center">No vehicles</td></tr>
        @endforelse
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
