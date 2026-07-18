<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table,th,td{
            border:1px solid black;
        }

        th,td{
            padding:8px;
        }

        h2{
            text-align:center;
        }

    </style>

</head>

<body>

<h2>

Laporan Booking KisekiCourt

</h2>

<table>

<thead>

<tr>

<th>No</th>

<th>User</th>

<th>Lapangan</th>

<th>Tanggal</th>

<th>Total</th>

<th>Status</th>

</tr>

</thead>

<tbody>

@foreach($bookings as $booking)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $booking->user->name }}</td>

<td>{{ $booking->schedule->court->name }}</td>

<td>{{ $booking->schedule->date }}</td>

<td>

Rp {{ number_format($booking->total_price,0,',','.') }}

</td>

<td>{{ ucfirst($booking->status) }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>