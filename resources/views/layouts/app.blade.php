<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f5f7;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #2e2e2e;
        }
        .sidebar .logo {
            font-size: 20px;
            font-weight: 600;
            padding: 20px;
            color: #fff;
            border-bottom: 1px solid #444;
        }
        .sidebar small {
            color: #aaa;
            padding: 15px 20px 5px;
            display: block;
        }
        .sidebar a {
            color: #ddd;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            border-radius: 8px;
            margin: 4px 10px;
        }
        .sidebar a.active,
        .sidebar a:hover {
            background: #3a3a3a;
            color: #fff;
        }

        /* Navbar */
        .topbar {
            background: #fff;
            border-bottom: 1px solid #ddd;
            height: 60px;
        }

        /* Cards */
        .stat-card {
            border-radius: 14px;
            border: none;
            box-shadow: 0 6px 18px rgba(0,0,0,.08);
        }

        /* Tables */
        .table thead th {
            color: #555;
            font-weight: 400;
            border-bottom: 2px solid #e0e0e0;
        }

         /* Card style */
    .dashboard-card {
        background: #fff;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0,0,0,.15);
        height: 100%;
    }

    .dashboard-card h6 {
        font-weight: 400;
    }

    .dashboard-number {
        font-size: 32px;
        font-weight: 700;
    }

    .dashboard-sub {
        font-size: 10px;
        color: #777;
    }

    /* Tables */
    .dashboard-table th {
        font-weight: 600;
        border-bottom: 2px solid #aaa;
        padding-bottom: 10px;
    }

    .dashboard-table td {
        padding: 14px 0;
    }

    .status-completed {
        background: #4CAF50;
        color: #fff;
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 13px;
    }
    </style>
</head>
<body>

<div class="d-flex">
    @include('partials.sidebar')

    <div class="flex-grow-1">
        @include('partials.navbar')

        <main class="p-4">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
