<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Form upload pembayaran
     */
    public function create(Booking $booking)
    {
        // Pastikan booking milik user yang sedang login
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }

        return view('user.payment.create', compact('booking'));
    }

    /**
     * Simpan pembayaran
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $booking = Booking::findOrFail($request->booking_id);

        if ($booking->user_id != Auth::id()) {
            abort(403);
        }

        $path = $request->file('payment_proof')
            ->store('payments', 'public');

        Payment::create([
            'booking_id'     => $booking->id,
            'payment_proof'  => $path,
            'status'         => 'pending',
        ]);

        return redirect()
            ->route('user.bookings.history')
            ->with('success', 'Bukti pembayaran berhasil diupload.');
    }

    /**
     * Detail pembayaran
     */
    public function show(Payment $payment)
    {
        if ($payment->booking->user_id != Auth::id()) {
            abort(403);
        }

        return view('user.payment.show', compact('payment'));
    }
}