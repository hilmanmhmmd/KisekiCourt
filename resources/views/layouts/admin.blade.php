<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KisekiCourt Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            background:#f5f6fa;
        }

        .sidebar{
            position:fixed;
            top:0;
            left:0;
            width:250px;
            height:100vh;
            background:#1f2937;
            color:white;
        }

        .sidebar h3{
            padding:20px;
            text-align:center;
            border-bottom:1px solid rgba(255,255,255,.15);
        }

        .sidebar a{
            display:block;
            padding:15px 20px;
            color:white;
            text-decoration:none;
            transition:.3s;
        }

        .sidebar a:hover{
            background:#374151;
        }

        .content{
            margin-left:250px;
            padding:30px;
        }

        .topbar{
            background:white;
            border-radius:10px;
            padding:15px 20px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
            margin-bottom:25px;
        }
    </style>

</head>
<body>

<div class="sidebar">

    <h3>🏀 KisekiCourt</h3>

    <a href="{{ route('admin.dashboard') }}">
        🏠 Dashboard
    </a>

    <a href="{{ route('admin.courts.index') }}">
        🏀 Data Lapangan
    </a>

    <a href="{{ route('admin.schedules.index') }}">
        📅 Jadwal
    </a>

    <a href="{{ route('admin.bookings.index') }}">
        📝 Booking
    </a>

    <a href="{{ route('admin.payments.index') }}">
        💳 Pembayaran
    </a>

    <a href="{{ route('admin.reports.index') }}">
        📊 Laporan
    </a>

    <hr>

    <a href="{{ route('landing') }}">
        🌐 Landing Page
    </a>

</div>

<div class="content">

    <div class="topbar d-flex justify-content-between align-items-center">

        <h4 class="mb-0">
            Dashboard Admin
        </h4>

        <div class="d-flex align-items-center">

            <span class="me-3">

                👋 Halo,
                <strong>{{ Auth::user()->name }}</strong>

            </span>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="btn btn-danger btn-sm">

                    Logout

                </button>

            </form>

        </div>

    </div>

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>