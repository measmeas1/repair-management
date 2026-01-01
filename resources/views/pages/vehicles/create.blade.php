@extends('layouts.app')

@section('title', 'Add Vehicle')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Add Vehicle</h3>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <form id="vehicleForm" action="{{ route('vehicles.store') }}" method="POST">
        @csrf

        {{-- Customer --}}
        <div class="mb-3">
            <label>Customer</label>
            <select name="customer_id" class="form-control @error('customer_id') is-invalid @enderror" required>
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
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
                <option value="Lexus" {{ old('model') == 'Lexus' ? 'selected' : '' }}>Lexus</option>
                <option value="Toyota" {{ old('model') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                <option value="Ford" {{ old('model') == 'Ford' ? 'selected' : '' }}>Ford</option>
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
            <input type="text" name="plate_number" id="plate_number" class="form-control @error('plate_number') is-invalid @enderror" 
                   value="{{ old('plate_number') }}" required>
            @error('plate_number')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Year --}}
        <div class="mb-3">
            <label>Year</label>
            <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}">
            @error('year')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Vehicle</button>
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

// Populate car names on brand change
brandSelect.addEventListener('change', function() {
    const selectedBrand = this.value;
    nameSelect.innerHTML = '<option value="">Select Name</option>';
    if(selectedBrand && carNames[selectedBrand]){
        carNames[selectedBrand].forEach(name => {
            const option = document.createElement('option');
            option.value = name;
            option.textContent = name;
            if("{{ old('name') }}" === name) option.selected = true;
            nameSelect.appendChild(option);
        });
    }
});

// Trigger populate if old value exists (after validation fail)
@if(old('model'))
populateCarNames("{{ old('model') }}");
@endif

function populateCarNames(brand){
    nameSelect.innerHTML = '<option value="">Select Name</option>';
    if(brand && carNames[brand]){
        carNames[brand].forEach(name => {
            const option = document.createElement('option');
            option.value = name;
            option.textContent = name;
            if("{{ old('name') }}" === name) option.selected = true;
            nameSelect.appendChild(option);
        });
    }
}
</script>
@endsection
