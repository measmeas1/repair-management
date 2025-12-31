<div class="sidebar">
    <div class="logo">
        <i class="bi bi-gear-fill text-danger"></i> Auto Repair Manager
    </div>

    <small>Management</small>

    {{-- Dashboard --}}
    <a href="{{ route('dashboard') }}"
       class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid"></i> Dashboard
    </a>

    {{-- Admin Only --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('users.index') }}"
           class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
            <i class="bi bi-person"></i> Staff
        </a>
    @endif

    {{-- Customers --}}
    <a href="{{ route('customers.index') }}"
       class="{{ request()->routeIs('customers.*') ? 'active' : '' }}">
        <i class="bi bi-people"></i> Customers
    </a>

    {{-- Vehicles --}}
    <a href="{{ route('vehicles.index') }}"
       class="{{ request()->routeIs('vehicles.*') ? 'active' : '' }}">
        <i class="bi bi-car-front"></i> Vehicles
    </a>

    {{-- Services (Admin only) --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('services.index') }}"
           class="{{ request()->routeIs('services.*') ? 'active' : '' }}">
            <i class="bi bi-wrench"></i> Services
        </a>
    @endif

    {{-- Repairs --}}
    <a href="{{ route('repairs.index') }}"
       class="{{ request()->routeIs('repairs.*') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text"></i> Repair Records
    </a>

    {{-- Profile --}}
    <a href=""
       class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
        <i class="bi bi-person-circle"></i> Profile
    </a>
</div>
