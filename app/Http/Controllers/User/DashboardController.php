<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalBooking = Booking::where('user_id', $user->id)->count();

        $pendingBooking = Booking::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();

        $approvedBooking = Booking::where('user_id', $user->id)
            ->where('status', 'approved')
            ->count();

        return view('user.dashboard', compact(
            'totalBooking',
            'pendingBooking',
            'approvedBooking'
        ));
    }
}