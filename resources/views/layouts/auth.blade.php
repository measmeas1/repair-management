<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Repair Manager Login</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }
        .login-card {
            border-radius: 16px;
            border: 2px solid #ddd;
        }
        .btn-purple {
            background-color: #6c5ce7;
            color: white;
        }
        .btn-purple:hover {
            background-color: #5a4bcf;
            color: white;
        }
        ::placeholder {
            color: #b0b0b0;
            opacity: 1;
        }
        .form-control::placeholder {
            color: #b0b0b0;
            opacity: 1;
        }
        .btn-purple {
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-purple:disabled {
            opacity: 0.8;
        }

    </style>
</head>
<body>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    @yield('content')
</div>

</body>
</html>
