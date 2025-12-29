@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Customer Management</h2>

    <button class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Customer
    </button>
</div>
<p class="text-muted mb-4">Manage customers</p>

<div class="card p-4">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Location</th>
                <th>Total Repair</th>
                <th>Date</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>001</td>
                <td>Sal</td>
                <td>+85516998521</td>
                <td>Phnom Penh</td>
                <td>$20</td>
                <td>29,Dec,2025</td>
                <td class="text-center">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
            </tr>

            <tr>
                <td>002</td>
                <td>Ney</td>
                <td>+85512345678</td>
                <td>Kompong Speu</td>
                <td>$30</td>
                <td>29,Dec,2025</td>
                <td class="text-center">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
