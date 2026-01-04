@extends('layouts.app')

@section('title', 'Add Repair')

@section('content')
<div class="card p-4">
    <h4 class="fw-bold mb-3">Add Repair</h4>

    <form action="{{ route('repairs.store') }}" method="POST">
        @csrf

        {{-- Vehicle --}}
        <div class="mb-3">
            <label class="form-label">Vehicle</label>
            <select name="vehicle_id" class="form-control" required>
                <option value="">Select Vehicle</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">
                        {{ $vehicle->model }} {{ $vehicle->name }} -
                        {{ $vehicle->customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Staff --}}
        <div class="mb-3">
            <label class="form-label">Assign Staff</label>
            <select name="user_id" class="form-control" required>
                <option value="">Select Staff</option>
                @foreach($staffs as $staff)
                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="not started">Not Started</option>
                <option value="in progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <hr>

        <h5 class="fw-semibold mb-3">Services</h5>

        @foreach($services as $service)
            <div class="row align-items-center mb-2">
                <div class="col-md-5">
                    {{ $service->service_name }}
                    <small class="text-muted">(${{ $service->price }})</small>
                </div>

                <div class="col-md-3">
                    <input type="number"
                           name="services[{{ $service->id }}][quantity]"
                           class="form-control"
                           min="0"
                           placeholder="Qty">
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            <button class="btn btn-primary">Save Repair</button>
            <a href="{{ route('repairs.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
@endsection
