@extends('layouts.app')

@section('title', 'Edit Service')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Edit Service</h3>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Service Name</label>
            <input type="text" name="service_name" class="form-control @error('service_name') is-invalid @enderror" value="{{ old('service_name', $service->service_name) }}" required>
            @error('service_name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                <option value="">Select Category</option>
                <option value="Engine" {{ old('category', $service->category) == 'Engine' ? 'selected' : '' }}>Engine</option>
                <option value="Spray" {{ old('category', $service->category) == 'Spray' ? 'selected' : '' }}>Spray</option>
                <option value="Maintenance" {{ old('category', $service->category) == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                <option value="Electric" {{ old('category', $service->category) == 'Electric' ? 'selected' : '' }}>Electric</option>
            </select>
            @error('category')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $service->price) }}" required>
            @error('price')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration', $service->duration) }}">
            @error('duration')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="active" {{ old('status', $service->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $service->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection
