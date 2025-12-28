@extends('layouts.auth')

@section('content')
<div class="card login-card p-4" style="width: 410px; height: 400px;">
    <div class="card-body">

     <h4 class="text-center mb-2">Repair Manager Login</h4>
        <p class="text-center text-muted mb-4">
            Sign in to manage your auto repair business
        </p>

        <form>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control " placeholder="Enter email">
            </div>

         <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-purple w-100 mt-3">
                Sign In
            </button>
        </form>

    </div>
</div>
@endsection
