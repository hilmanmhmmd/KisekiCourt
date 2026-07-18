<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Menampilkan semua pembayaran
     */
    public function index()
    {
        $payments = Payment::with([
            'booking.user',
            'booking.schedule.court'
        ])
        ->latest()
        ->paginate(10);

        return view('admin.payment.index', compact('payments'));
    }

    /**
     * Detail pembayaran
     */
    public function show(Payment $payment)
    {
        $payment->load([
            'booking.user',
            'booking.schedule.court'
        ]);

        return view('admin.payment.show', compact('payment'));
    }

    /**
     * Approve / Reject pembayaran
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        // Update status pembayaran
        $payment->update([
            'status' => $request->status,
        ]);

        // Update status booking
        $payment->booking->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.payments.index')
            ->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    /**
     * Tidak digunakan
     */
    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function edit(Payment $payment)
    {
        abort(404);
    }

    public function destroy(Payment $payment)
    {
        abort(404);
    }
}