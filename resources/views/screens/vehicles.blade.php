@extends('layouts.app')

@section('title', 'Vehicles')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Vehicles</h2>

    <button class="btn btn-secondary">
        <i class="bi bi-plus-circle"></i> Add Vehicles
    </button>
</div>
<p class="text-muted mb-4">Track all vehicles and service</p>

<div class="card p-4">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Owner</th>
                <th>Name</th>
                <th>Model</th>
                <th>Plate Number</th>
                <th>Year</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>001</td>
                <td>Nith</td>
                <td>Camry02</td>
                <td>Totota</td>
                <td>2AB2321</td>
                <td>2002</td>
                <td class="text-center">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
            </tr>

            <tr>
                <td>002</td>
                <td>Meas</td>
                <td>RX300</td>
                <td>Lexus</td>
                <td>2BR4321</td>
                <td>1999</td>
                <td class="text-center">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
