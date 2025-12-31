@extends('layouts.auth')

@section('content')
<div class="card login-card p-4 shadow-sm" style="width: 410px;">
    <div class="card-body">

        <h4 class="text-center mb-2 fw-bold">Repair Manager Login</h4>
        <p class="text-center text-muted mb-4">
            Sign in to manage your auto repair business
        </p>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}" required placeholder="Enter email">

                {{-- Field-specific error --}}
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" 
                       class="form-control @error('password') is-invalid @enderror" required placeholder="Enter password">

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
            @endif

            <button type="submit" class="btn btn-purple w-100 mt-3">
                Sign In
            </button>

        </form>

        <div class="mt-3 text-center">
            <small class="text-muted">Forgot your password? Contact admin.</small>
        </div>

    </div>
</div>

@endsection
