<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * Halaman laporan
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

        $totalIncome = Booking::where('status', 'approved')
            ->sum('total_price');

        return view('admin.report.index', compact(
            'bookings',
            'totalIncome'
        ));
    }

    /**
     * Export PDF
     */
    public function exportPdf()
    {
        $bookings = Booking::with([
            'user',
            'schedule.court',
            'payment'
        ])
        ->latest()
        ->get();

        $totalIncome = Booking::where('status', 'approved')
            ->sum('total_price');

        $pdf = Pdf::loadView(
            'admin.report.pdf',
            compact(
                'bookings',
                'totalIncome'
            )
        );

        return $pdf->stream('laporan-booking.pdf');
    }
}