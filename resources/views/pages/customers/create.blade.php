@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Add New Customer</h3>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
          <label>Location (Province / City)</label>
          <select name="location" id="location" class="form-control" required>
              <option value="">Select Province / City</option>
              <option value="Phnom Penh">Phnom Penh</option>
              <option value="Kandal">Kandal</option>
              <option value="Takeo">Takeo</option>
              <option value="Battambang">Battambang</option>
              <option value="Siem Reap">Siem Reap</option>
              <option value="Kampong Speu">Kampong Speu</option>
          </select>
      </div>
      
      <div class="mb-3">
          <label>Address (District / Khan)</label>
          <select name="address" id="address" class="form-control" disabled>
              <option value="">Select District</option>
              <option value="7 Makara">7 Makara</option>
              <option value="Orussey">Orussey</option>
              <option value="Daun Penh">Daun Penh</option>
              <option value="Chamkarmon">Chamkarmon</option>
              <option value="Toul Kork">Toul Kork</option>
              <option value="Sen Sok">Sen Sok</option>
          </select>
          <small class="text-muted">Available only for Phnom Penh</small>
      </div>

        <button type="submit" class="btn btn-primary">Add Customer</button>
    </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const locationSelect = document.getElementById('location');
      const addressSelect = document.getElementById('address');
  
      function toggleAddress() {
          if (locationSelect.value === 'Phnom Penh') {
              addressSelect.disabled = false;
          } else {
              addressSelect.disabled = true;
              addressSelect.value = '';
          }
      }
  
      locationSelect.addEventListener('change', toggleAddress);
  
      toggleAddress();
  });
</script>
  

@endsection