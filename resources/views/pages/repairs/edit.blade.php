@extends('layouts.app')

@section('title', 'Edit Repair')

@section('content')
<div class="card p-4">
    <h4 class="fw-bold mb-3">Edit Repair</h4>

    <form action="{{ route('repairs.update', $repair->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Vehicle --}}
        <div class="mb-3">
            <label class="form-label">Vehicle</label>
            <select name="vehicle_id" class="form-control" required>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}"
                        {{ $repair->vehicle_id == $vehicle->id ? 'selected' : '' }}>
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
                @foreach($staffs as $staff)
                    <option value="{{ $staff->id }}"
                        {{ $repair->user_id == $staff->id ? 'selected' : '' }}>
                        {{ $staff->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="not started" {{ $repair->status == 'not started' ? 'selected' : '' }}>Not Started</option>
                <option value="in progress" {{ $repair->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $repair->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <hr>

        <h5 class="fw-semibold mb-3">Services</h5>

        @foreach($services as $service)
            @php
                $pivot = $repair->services->firstWhere('id', $service->id)?->pivot;
            @endphp

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
                           value="{{ $pivot->quantity ?? 0 }}">
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            <button class="btn btn-primary">Update Repair</button>
            <a href="{{ route('repairs.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
