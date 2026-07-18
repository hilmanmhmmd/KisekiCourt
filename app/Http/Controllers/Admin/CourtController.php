<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourtController extends Controller
{
    /**
     * Menampilkan daftar lapangan
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $courts = Court::when($keyword, function ($query) use ($keyword) {

            $query->where('name', 'like', "%$keyword%")
                ->orWhere('type', 'like', "%$keyword%");

        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('admin.court.index', compact('courts'));
    }

    /**
     * Form tambah lapangan
     */
    public function create()
    {
        return view('admin.court.create');
    }

    /**
     * Simpan lapangan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'type' => 'required|max:100',
            'description' => 'nullable',
            'price_per_hour' => 'required|numeric|min:0',
            'status' => 'required|in:available,maintenance',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courts', 'public');
        }

        Court::create($validated);

        return redirect()
            ->route('admin.courts.index')
            ->with('success', 'Lapangan berhasil ditambahkan.');
    }

    /**
     * Detail lapangan
     */
    public function show(Court $court)
    {
        return view('admin.court.show', compact('court'));
    }

    /**
     * Form edit
     */
    public function edit(Court $court)
    {
        return view('admin.court.edit', compact('court'));
    }

    /**
     * Update data lapangan
     */
    public function update(Request $request, Court $court)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'type' => 'required|max:100',
            'description' => 'nullable',
            'price_per_hour' => 'required|numeric|min:0',
            'status' => 'required|in:available,maintenance',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // Hapus gambar lama jika ada
            if ($court->image && Storage::disk('public')->exists($court->image)) {
                Storage::disk('public')->delete($court->image);
            }

            // Upload gambar baru
            $validated['image'] = $request->file('image')->store('courts', 'public');
        }

        $court->update($validated);

        return redirect()
            ->route('admin.courts.index')
            ->with('success', 'Data lapangan berhasil diperbarui.');
    }

    /**
     * Hapus lapangan
     */
    public function destroy(Court $court)
    {
        // Hapus gambar jika ada
        if ($court->image && Storage::disk('public')->exists($court->image)) {
            Storage::disk('public')->delete($court->image);
        }

        $court->delete();

        return redirect()
            ->route('admin.courts.index')
            ->with('success', 'Lapangan berhasil dihapus.');
    }
}