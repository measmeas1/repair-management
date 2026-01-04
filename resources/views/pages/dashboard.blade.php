@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp

@section('title', 'Dashboard')

@section('content')
<h2 class="fw-bold">Dashboard</h2>
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
                <th>Customer</th>
                <th>Vehicle</th>
                <th>Brand</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Total Cost</th>
                <th>Service Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Sal</td>
                <td>Camry 02</td>
                <td>Toyota</td>
                <td>Meas</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>$140.0</td>
                <td>28/Dec/2025</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
