@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Dashboard</h2>
</div>
<p class="text-muted mb-4">Welcome to your vehicle service management system</p>

{{-- STATS + NEW CUSTOMERS --}}
<div class="row g-4 mb-4">

    {{-- LEFT: STAT CARDS --}}
    <div class="col-md-7">
        <div class="row g-4">

            <div class="col-md-6">
                <div class="card stat-card p-3">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Total Customer</span>
                        <i class="bi bi-people"></i>
                    </div>
                    <h2 class="fw-bold mt-2">{{  $totalCustomer }}</h2>
                    <small class="text-muted">All active customer in system</small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card stat-card p-3">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Total Revenue</span>
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <h2 class="fw-bold mt-2">${{ $totalRevenue }}</h2>
                    <small class="text-muted">Revenue this month</small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card stat-card p-3">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Active Staffs</span>
                        <i class="bi bi-person"></i>
                    </div>
                    <h2 class="fw-bold mt-2">{{ $activeStaff }}</h2>
                    <small class="text-muted">Team member</small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card stat-card p-3">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Completed Vehicles</span>
                        <i class="bi bi-car-front"></i>
                    </div>
                    <h2 class="fw-bold mt-2">{{ $completeVehicle }}</h2>
                    <small class="text-muted">Vehicle work completed</small>
                </div>
            </div>

        </div>
    </div>

    {{-- RIGHT: NEW CUSTOMERS --}}
    <div class="col-md-5">
        <div class="dashboard-card h-100 p-3">
            <h5 class="fw-bold mb-3">New Customers</h5>

            <table class="table table-sm dashboard-table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($newCustomers as $customer)
                        <tr>
                            <td>{{ Str::limit($customer->name, 10) }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ Str::limit($customer->location, 10) }}</td>
                            <td>{{ $customer->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No new customers
                            </td>
                        </tr>
                    @endforelse
                    </tbody>                    
            </table>
        </div>
    </div>

</div>


{{-- Recent Repair --}}
<div class="card stat-card p-3">
    <h5 class="fw-semibold mb-3">Recent Repair</h5>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Vehicle</th>
                <th>Plate</th>
                <th>Staff</th>
                <th>Service</th>
                <th>Status</th>
                <th>Total Cost</th>
                <th>Service Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentRepairs as $repair)
            <tr>
                <td>{{ $repair->id }}</td>
            
                <td>{{ $repair->vehicle->customer->name }}</td>
            
                <td>{{ $repair->vehicle->model }} {{ $repair->vehicle->name }}</td>
            
                <td>{{ $repair->vehicle->plate_number }}</td>
            
                <td>{{ $repair->staff->name }}</td>
            
                <td>
                    <span class="badge bg-secondary">
                        {{ $repair->services->count() }} services
                    </span>
                </td>
            
                <td>
                    @if($repair->status === 'completed')
                        <span class="badge bg-success">Completed</span>
                    @elseif($repair->status === 'in progress')
                        <span class="badge bg-warning">In Progress</span>
                    @else
                        <span class="badge bg-secondary">Not Started</span>
                    @endif
                </td>
            
                <td>${{ number_format($repair->total, 2) }}</td>
            
                <td>{{ $repair->created_at->format('d M Y') }}</td>
            
                <td>
                    <a href="{{ route('repairs.show', $repair->id) }}"
                       class="btn btn-sm btn-outline-primary">
                        View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center text-muted">
                    No recent repairs
                </td>
            </tr>
            @endforelse
            </tbody>
            
    </table>
</div>
@endsection
