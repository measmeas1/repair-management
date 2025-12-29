<div class="sidebar">
    <div class="logo">
        <i class="bi bi-gear-fill text-danger"></i> Auto Repair Manage
    </div>

    <small>Management</small>

    <a href="{{ route('dashboard') }}"
       class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid"></i> Dashboard
    </a>

    <a href="{{ route('staff') }}"
       class="{{ request()->routeIs('staff') ? 'active' : '' }}">
        <i class="bi bi-person"></i> Staff
    </a>

     <a href="{{ route('customers') }}"
       class="{{ request()->routeIs('customers') ? 'active' : '' }}">
        <i class="bi bi-people"></i> Customers
    </a>

    <a href="{{ route('vehicles') }}"
       class="{{ request()->routeIs('vehicles') ? 'active' : '' }}">
        <i class="bi bi-car-front"></i> Vehicles
    </a>

    <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">
        <i class="bi bi-wrench"></i> Services
    </a>

    <a href="{{ route('repair') }}" class="{{ request()->routeIs('repair') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text"></i> Repair Records
    </a>

    <a href="#">
        <i class="bi bi-person-circle"></i> Profile
    </a>
</div>
