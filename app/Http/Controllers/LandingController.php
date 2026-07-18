<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        $courts = Court::latest()->take(6)->get();

        return view('landing', compact('courts'));
    }
}