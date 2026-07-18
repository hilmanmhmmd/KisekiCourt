<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KisekiCourt</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>

        body{

            font-family:'Poppins',sans-serif;

            background:linear-gradient(135deg,#ff9800,#ffb300,#ffc107);

            min-height:100vh;

            overflow-x:hidden;

        }

        .logo{

            font-size:75px;

            filter:drop-shadow(0 5px 12px rgba(0,0,0,.35));

            margin-bottom:10px;

        }

        .title{

            font-size:36px;

            font-weight:800;

            color:#ffffff;

            text-shadow:0 4px 10px rgba(0,0,0,.35);

            letter-spacing:.5px;

        }

        .subtitle{

            color:#ffffff;

            font-size:16px;

            font-weight:500;

            opacity:.95;

            text-shadow:0 2px 8px rgba(0,0,0,.25);

            margin-bottom:25px;

        }

        .auth-card{

            background:#fff;

            border-radius:22px;

            box-shadow:0 20px 45px rgba(0,0,0,.18);

            padding:35px;

            transition:.35s;

        }

        .auth-card:hover{

            transform:translateY(-5px);

            box-shadow:0 30px 60px rgba(0,0,0,.25);

        }

        input{

            border-radius:12px !important;

            height:48px;

        }

        input:focus{

            border-color:#ff9800 !important;

            box-shadow:0 0 0 .2rem rgba(255,152,0,.2) !important;

        }

        button{

            border-radius:12px !important;

            transition:.3s;

        }

        button:hover{

            transform:translateY(-2px);

        }

        a{

            transition:.3s;

        }

        .copyright{

            color:white;

            font-size:14px;

            text-shadow:0 2px 8px rgba(0,0,0,.3);

        }

    </style>

</head>

<body>

<div class="container d-flex justify-content-center align-items-center"
     style="min-height:100vh;">

    <div class="row w-100 justify-content-center">

        <div class="col-lg-5 col-md-7">

            <div class="text-center mb-4">

                <a href="{{ route('landing') }}"
                   class="text-decoration-none">

                    <div class="logo">

                        🏀

                    </div>

                    <div class="title">

                        KisekiCourt

                    </div>

                    <div class="subtitle">

                        Sistem Booking Lapangan Basket

                    </div>

                </a>

            </div>

            <div class="auth-card">

                {{ $slot }}

            </div>

            <div class="text-center mt-4 copyright">

                © {{ date('Y') }} KisekiCourt • All Rights Reserved

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>