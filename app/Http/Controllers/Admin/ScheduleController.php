<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Court;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Tampilkan semua jadwal
     */
    public function index()
    {
        $schedules = Schedule::with('court')
            ->latest()
            ->paginate(10);

        return view('admin.schedule.index', compact('schedules'));
    }

    /**
     * Form tambah jadwal
     */
    public function create()
    {
        $courts = Court::all();

        return view('admin.schedule.create', compact('courts'));
    }

    /**
     * Simpan jadwal
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'court_id'   => 'required|exists:courts,id',
            'date'       => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'required|after:start_time',
            'status'     => 'required|in:available,booked',
        ]);

        Schedule::create($validated);

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Detail jadwal
     */
    public function show(Schedule $schedule)
    {
        return view('admin.schedule.show', compact('schedule'));
    }

    /**
     * Form edit jadwal
     */
    public function edit(Schedule $schedule)
    {
        $courts = Court::all();

        return view('admin.schedule.edit', compact('schedule', 'courts'));
    }

    /**
     * Update jadwal
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'court_id'   => 'required|exists:courts,id',
            'date'       => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'required|after:start_time',
            'status'     => 'required|in:available,booked',
        ]);

        $schedule->update($validated);

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Hapus jadwal
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}