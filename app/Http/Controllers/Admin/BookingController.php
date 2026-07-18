<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Daftar seluruh booking
     */
    public function index()
    {
        $bookings = Booking::with([
            'user',
            'schedule.court',
            'payment'
        ])
        ->latest()
        ->paginate(10);

        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Detail booking
     */
    public function show(Booking $booking)
    {
        $booking->load([
            'user',
            'schedule.court',
            'payment'
        ]);

        return view('admin.booking.show', compact('booking'));
    }

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function edit(Booking $booking)
    {
        abort(404);
    }

    public function update(Request $request, Booking $booking)
    {
        abort(404);
    }

    public function destroy(Booking $booking)
    {
        abort(404);
    }
}