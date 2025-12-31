@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Edit Customer</h3>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $customer->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" required>
        </div>

        {{-- Province --}}
        <div class="mb-3">
            <label>Province / City</label>
            <select name="location" id="location" class="form-control" required>
                <option value="">Select Province</option>
                @foreach(['Phnom Penh','Kandal','Takeo','Battambang','Siem Reap','Kampong Speu','Kampot'] as $place)
                    <option value="{{ $place }}" {{ $customer->location === $place ? 'selected' : '' }}>
                        {{ $place }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- District --}}
        <div class="mb-3">
            <label>District (Phnom Penh only)</label>
            <select name="address" id="address" class="form-control"
                {{ $customer->location !== 'Phnom Penh' ? 'disabled' : '' }}>
                <option value="">Select District</option>
                @foreach([
                    '7 Makara','Toul Kork','Chamkarmon','Daun Penh',
                    'Russey Keo','Chbar Ampov','Sen Sok','Meanchey'
                ] as $district)
                    <option value="{{ $district }}"
                        {{ $customer->address === $district ? 'selected' : '' }}>
                        {{ $district }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Only available if Phnom Penh is selected</small>
        </div>

        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const locationSelect = document.getElementById('location');
    const addressSelect  = document.getElementById('address');

    function toggleAddress() {
        if (locationSelect.value === 'Phnom Penh') {
            addressSelect.disabled = false;
        } else {
            addressSelect.disabled = true;
            addressSelect.value = '';
        }
    }

    toggleAddress();
    locationSelect.addEventListener('change', toggleAddress);
});
</script>
@endsection
