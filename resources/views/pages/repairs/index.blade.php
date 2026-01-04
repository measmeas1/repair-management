@extends('layouts.app')

@section('title', 'Repairs')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Repair Records</h2>
    <a href="{{ route('repairs.create') }}" class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Repair
    </a>
</div>

<p class="text-muted mb-4">Track all service and repair work</p>

{{-- Flash success message --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card p-4">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <td>ID</td>
                <th>Vehicle</th>
                <th>Plate</th>
                <th>Owner</th>
                <th>Staff</th>
                <th>Status</th>
                <th>Total</th>
                <th>Date</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($repairs as $repair)
                <tr>
                    <td>{{ $repair->id }}</td>
                    <td>{{ $repair->vehicle->model }} {{ $repair->vehicle->name }}</td>
                    <td>{{ $repair->vehicle->plate_number }}</td>
                    <td>{{ $repair->vehicle->customer->name }}</td>
                    <td>{{ $repair->staff->name }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle
                                @if($repair->status === 'completed') btn-success
                                @elseif($repair->status === 'in progress') btn-warning
                                @else btn-secondary
                                @endif
                                dropdown-toggle fw-semibold"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ ucfirst($repair->status) }}
                            </button>
                    
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="{{ route('repairs.updateStatus', $repair->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="not started">
                                        <button class="dropdown-item bg-secondary text-white fw-semibold">Not Started</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('repairs.updateStatus', $repair->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="in progress">
                                        <button class="dropdown-item bg-warning text-dark fw-semibold">In Progress</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('repairs.updateStatus', $repair->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="completed">
                                        <button class="dropdown-item bg-success text-white fw-semibold">Completed</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>${{ number_format($repair->total, 2) }}</td>
                    <td>{{ $repair->created_at->format('d, M Y') }}</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" style="cursor: pointer;">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('repairs.show', $repair->id) }}">
                                        <i class="bi bi-eye"></i> View Details
                                    </a>
                                </li>                                
                                <li>
                                    <a class="dropdown-item" href="{{ route('repairs.edit', $repair->id) }}">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('repairs.destroy', $repair->id) }}" method="POST" onsubmit="return confirm('Delete this repair record?')">
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
                {{ $repairs->links() }}
            @empty
                <tr>
                    <td colspan="6" class="text-center">No repair records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
