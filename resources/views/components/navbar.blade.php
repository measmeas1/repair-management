<nav class="topbar d-flex align-items-center px-4">
    <h6 class="mb-0 fw-bold admin-title">Admin Management</h6>

    <div class="ms-auto d-flex align-items-center gap-3">
        @php $user = auth()->user(); @endphp
        <div class="text-muted">
            Welcome, <strong>{{ $user->name }}</strong>
        </div>
        
        <a href="{{ route('profile.index') }}">
            @if($user->image)
                <img src="{{ asset('storage/avatars/'.$user->image) }}"
                     alt="Avatar"
                     class="rounded-circle"
                     style="width:36px; height:36px; object-fit:cover; cursor:pointer;">
            @else
                <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center"
                     style="width:36px; height:36px; font-size:16px; cursor:pointer;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
        </a>

        <div class="divider"></div>

        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-logout d-flex align-items-center gap-2">
                <i class="bi bi-box-arrow-right fs-5"></i>
            </button>
        </form>
    </div>
</nav>
