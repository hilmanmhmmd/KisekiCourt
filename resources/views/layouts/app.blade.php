<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KisekiCourt</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
        }

        .navbar-brand{
            font-weight:bold;
            color:#ff7b00 !important;
        }

        .btn-orange{
            background:#ff7b00;
            color:white;
        }

        .btn-orange:hover{
            background:#e86e00;
            color:white;
        }

        .card{
            border:none;
            border-radius:12px;
        }

        footer{
            margin-top:60px;
        }

        .card{
            transition: .3s;
        }

        .card:hover{
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,.15);
        }
    </style>

</head>

<body>

@include('layouts.navbar')

<main class="py-4">
    @yield('content')
</main>

@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>