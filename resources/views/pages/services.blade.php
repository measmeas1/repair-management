@extends('layouts.app')

@section('title', 'Services')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Services</h2>

    <button class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Service
    </button>
</div>
<p class="text-muted mb-4">Manage services offering and pricing </p>

<div class="card p-4">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>Service Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Body and pain</td>
                <td>Spray</td>
                <td>$30</td>
                <td>30min</td>
                <td><span class="badge bg-success">Active</span></td>
                <td class="text-center">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
            </tr>

            <tr>
                <td>Brake Inspection</td>
                <td>Inspection</td>
                <td>$20</td>
                <td>20min</td>
                <td><span class="badge bg-danger">Inactive</span></td>
                <td class="text-center">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
