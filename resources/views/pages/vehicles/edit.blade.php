@extends('layouts.app')

@section('title', 'Edit Vehicle')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Edit Vehicle</h3>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Customer --}}
        <div class="mb-3">
            <label>Customer</label>
            <select name="customer_id" class="form-control @error('customer_id') is-invalid @enderror" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ old('customer_id', $vehicle->customer_id) == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }} ({{ $customer->phone }})
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Brand --}}
        <div class="mb-3">
            <label>Brand</label>
            <select name="model" id="brand" class="form-control @error('model') is-invalid @enderror" required>
                <option value="">Select Brand</option>
                <option value="Lexus" {{ old('model', $vehicle->model) == 'Lexus' ? 'selected' : '' }}>Lexus</option>
                <option value="Toyota" {{ old('model', $vehicle->model) == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                <option value="Ford" {{ old('model', $vehicle->model) == 'Ford' ? 'selected' : '' }}>Ford</option>
            </select>
            @error('model')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Car Name --}}
        <div class="mb-3">
            <label>Car Name</label>
            <select name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                <option value="">Select Name</option>
            </select>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Plate Number --}}
        <div class="mb-3">
            <label>Plate Number</label>
            <input type="text" name="plate_number" value="{{ old('plate_number', $vehicle->plate_number) }}" class="form-control @error('plate_number') is-invalid @enderror" required>
            @error('plate_number')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Year --}}
        <div class="mb-3">
            <label>Year</label>
            <input type="number" name="year" value="{{ old('year', $vehicle->year) }}" class="form-control @error('year') is-invalid @enderror">
            @error('year')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Update Vehicle</button>
    </form>
</div>

<script>
const brandSelect = document.getElementById('brand');
const nameSelect = document.getElementById('name');

const carNames = {
    'Lexus': ['Lexus RX 300','Lexus RX 350','Lexus RX 500h','Lexus NX 350 F SPORT','Lexus LX 600','Lexus LX 600 F SPORT','Lexus LS 500','Lexus LM 350h'],
    'Toyota': ['Toyota Camry','Toyota Corolla','Toyota Prius','Toyota Highlander','Toyota RAV4','Toyota Corolla Cross','Toyota Yaris Cross','Toyota Land Cruiser'],
    'Ford': ['Ford Ranger','Ford F-150','Ford Everest','Ford Explorer']
};

// Determine current brand and name (use old input if validation failed)
const savedBrand = "{{ old('model', $vehicle->model) }}";
const savedName  = "{{ old('name', $vehicle->name) }}";

// Populate names dropdown
function populateNames(brand){
    nameSelect.innerHTML = '<option value="">Select Name</option>';
    if(brand && carNames[brand]){
        carNames[brand].forEach(name => {
            const option = document.createElement('option');
            option.value = name;
            option.textContent = name;
            if(name === savedName) option.selected = true;
            nameSelect.appendChild(option);
        });
    }
}

// Populate on page load
populateNames(savedBrand);

// Update names when brand changes
brandSelect.addEventListener('change', function(){
    populateNames(this.value);
});
</script>
@endsection
