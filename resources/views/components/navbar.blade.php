<nav class="topbar d-flex align-items-center px-4">
    <h6 class="mb-0 fw-bold admin-title">Admin Management</h6>

    <div class="ms-auto d-flex align-items-center gap-3">
        <div class="user-info d-flex align-items-center gap-2 pe-3">
            <span class="text-muted">Welcome, <strong>{{ auth()->user()->name }}</strong></span>
            <i class="bi bi-person-circle fs-5"></i>
        </div>

        <div class="divider"></div>

        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-logout d-flex align-items-center gap-2">
                <i class="bi bi-box-arrow-right fs-5"></i>
            </button>
        </form>        
    </div>
</nav>
