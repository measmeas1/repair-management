@extends('layouts.app')

@section('title', 'Staff')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Staff Management</h2>

    <button class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Staff
    </button>
</div>
<p class="text-muted mb-4">Manage admin and staff members</p>

<div class="card p-4">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contacts</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>001</td>
                <td>Meas</td>
                <td>+85516998521</td>
                <td><span class="badge bg-primary">M</span></td>
                <td>Admin</td>
                <td><span class="badge bg-success">Active</span></td>
                <td class="text-center">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
            </tr>

            <tr>
                <td>002</td>
                <td>Nith</td>
                <td>+85516998522</td>
                <td><span class="badge bg-danger">F</span></td>
                <td>Staff</td>
                <td><span class="badge bg-danger">Inactive</span></td>
                <td class="text-center">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
