<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Court;
use App\Models\Schedule;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $totalUsers = User::where('role', 'user')->count();

        $totalCourts = Court::count();

        $totalSchedules = Schedule::count();

        $totalBookings = Booking::count();

        $pendingBookings = Booking::where('status', 'pending')->count();

        // Statistik Pembayaran
        $pendingPayments = Payment::where('status', 'pending')->count();

        $approvedPayments = Payment::where('status', 'approved')->count();

        $rejectedPayments = Payment::where('status', 'rejected')->count();

        // Total Pendapatan
        $totalRevenue = Booking::where('status', 'approved')
            ->sum('total_price');

        // Booking Terbaru
        $latestBookings = Booking::with([
            'user',
            'schedule.court'
        ])
        ->latest()
        ->take(5)
        ->get();

        // Pembayaran Pending
        $pendingPaymentList = Payment::with([
            'booking.user',
            'booking.schedule.court'
        ])
        ->where('status', 'pending')
        ->latest()
        ->take(5)
        ->get();

        // =========================
        // Statistik Booking per Bulan
        // =========================

        $bookingChart = Booking::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();

        $chartLabels = [];
        $chartData = [];

        $months = [
            1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',
            5=>'Mei',6=>'Jun',7=>'Jul',8=>'Agu',
            9=>'Sep',10=>'Okt',11=>'Nov',12=>'Des'
        ];

        foreach($bookingChart as $item){

            $chartLabels[] = $months[$item->month];

            $chartData[] = $item->total;

        }

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCourts',
            'totalSchedules',
            'totalBookings',
            'pendingBookings',
            'pendingPayments',
            'approvedPayments',
            'rejectedPayments',
            'totalRevenue',
            'latestBookings',
            'pendingPaymentList',
            'chartLabels',
            'chartData'
        ));
    }
}