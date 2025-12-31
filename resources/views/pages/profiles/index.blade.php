@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<style>
    /* Page title */
    .profile-page h1 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    /* Card style */
    .profile-card {
        border-radius: 14px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        border: none;
        background: #fff;
    }

    /* Avatar */
    .profile-avatar {
        width: 90px;
        height: 90px;
        background: #ddd;
        border-radius: 50%;
    }

    /* Name & Role */
    .profile-name {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 2px;
        line-height: 1.2;
    }

    .profile-role {
        font-size: 14px;
        color: #888;
        margin: 0;
    }

    /* Right section */
    .profile-right {
        text-align: right;
    }

    /* Edit button (same size everywhere) */
    .btn-edit {
        background: #2f2f2f;
        color: #fff;
        border-radius: 20px;
        padding: 6px 18px;
        font-size: 14px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        height: 36px;
        text-decoration: none;
    }

    .btn-edit:hover {
        background: #1f1f1f;
        color: #fff;
    }

    /* Active badge */
    .badge-active {
        background: #d1f7dc;
        color: #1f8f3a;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        display: inline-block;
    }

    /* Info text */
    .info-label {
        color: #8a8a8a;
        font-size: 14px;
        margin-bottom: 2px;
    }

    .info-value {
        font-size: 16px;
        font-weight: 600;
    }
</style>

<div class="profile-page">

    {{-- Page Header --}}
    <div class="mb-4">
        <h1>Profile</h1>
        <p class="text-muted">Manage account profile</p>
    </div>

    {{-- My Profile Card --}}
    <div class="card profile-card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-4">
                <div class="profile-avatar"></div>

                <div>
                    <div class="profile-name">Name</div>
                    <div class="profile-role">Role</div>
                </div>
            </div>

            <div class="profile-right">
                <a href="#" class="btn-edit mb-2">
                    ✏️ Edit
                </a>

                <div class="fw-semibold mb-1">
                    Join on 29 Dec/2025
                </div>

                <span class="badge-active">Active</span>
            </div>

        </div>
    </div>

    {{-- Personal Information --}}
    <div class="card profile-card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Personal Information</h5>
                <a href="#" class="btn-edit">
                    ✏️ Edit
                </a>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="info-label">First Name</div>
                    <div class="info-value">Thim</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">Last Name</div>
                    <div class="info-value">Visal</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">City</div>
                    <div class="info-value">Takeo</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">Email Address</div>
                    <div class="info-value">visal@gmail.com</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">Phone</div>
                    <div class="info-value">+855 123456789</div>
                </div>

                <div class="col-md-4">
                    <div class="info-label">Province</div>
                    <div class="info-value">Phnom Penh</div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
