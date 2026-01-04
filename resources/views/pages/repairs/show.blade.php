@extends('layouts.app')

@section('title', 'Repair Details')

@section('content')
<div class="card p-4">
    <h4 class="fw-bold mb-3">Repair #{{ $repair->id }}</h4>

    <div class="row mb-4">
        <div class="col-md-6">
            <p><strong>Vehicle:</strong> {{ $repair->vehicle->model }} {{ $repair->vehicle->name }}</p>
            <p><strong>Owner:</strong> {{ $repair->vehicle->customer->name }}</p>
            <p><strong>Staff:</strong> {{ $repair->staff->name }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Status:</strong>
                <span class="badge
                    @if($repair->status === 'completed') bg-success
                    @elseif($repair->status === 'in progress') bg-warning
                    @else bg-secondary
                    @endif">
                    {{ ucfirst($repair->status) }}
                </span>
            </p>
            <p><strong>Total:</strong> ${{ number_format($repair->total, 2) }}</p>
            <p><strong>Date:</strong> {{ $repair->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <h5 class="fw-bold mb-3">Services</h5>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Service</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repair->services as $service)
                <tr>
                    <td>{{ $service->service_name }}</td>
                    <td>${{ number_format($service->pivot->price, 2) }}</td>
                    <td>{{ $service->pivot->quantity }}</td>
                    <td>${{ number_format($service->pivot->subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url()->previous() !== url()->current() 
        ? url()->previous() 
        : route('repairs.index') }}"
    class="btn btn-secondary mt-3">
        Back
    </a>

</div>
@endsection
