@extends('layouts.app')

@section('title', 'repair')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Repair Records</h2>

    <button class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Repair
    </button>
</div>
<p class="text-muted mb-4">Track all service and repair work </p>

<div class="card p-4">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>Vehicle</th>
                <th>Owner</th>
                <th>Date</th>
                <th>Staff</th>
                <th>Status</th>
                <th>Total</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2020Toyota Camry</td>
                <td>Ney</td>
                <td>29,Dec/25</td>
                <td>B sal</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>$149.00</td>
                <td class="text-center">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
            </tr>



        </tbody>
    </table>
</div>

@endsection
