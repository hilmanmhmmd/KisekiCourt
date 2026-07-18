<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Menampilkan jadwal yang tersedia
     */
    public function index()
    {
        $schedules = Schedule::with('court')
            ->where('status', 'available')
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('user.booking.index', compact('schedules'));
    }

    /**
     * Simpan booking
     */
    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        // Pastikan hanya jadwal yang masih available yang bisa dibooking
        $schedule = Schedule::with('court')
            ->where('status', 'available')
            ->findOrFail($request->schedule_id);

        Booking::create([
            'user_id' => Auth::id(),
            'schedule_id' => $schedule->id,
            'booking_date' => now()->toDateString(),
            'total_price' => $schedule->court->price_per_hour,
            'status' => 'pending',
        ]);

        // Ubah status jadwal menjadi booked
        $schedule->update([
            'status' => 'booked',
        ]);

        return redirect()
            ->route('user.bookings.history')
            ->with('success', 'Booking berhasil dibuat. Silakan lanjutkan pembayaran.');
    }

    /**
     * Riwayat booking user
     */
    public function history()
    {
        $bookings = Booking::with('schedule.court')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.booking.history', compact('bookings'));
    }
}