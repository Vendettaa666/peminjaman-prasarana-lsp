<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use Illuminate\Support\Facades\Auth;

class InputAspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $alldata = InputAspirasi::with(['user', 'kategori'])->latest()->get();
        } else {
            $alldata = InputAspirasi::with(['user', 'kategori'])
                ->where('user_id', Auth::id())
                ->latest()
                ->get();
        }
        return view('dashboard.input_aspirasi.index', compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Kategori::all();
        return view('dashboard.input_aspirasi.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan'  => 'required|string',
            'lokasi'      => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        InputAspirasi::create([
            'user_id'     => Auth::id(),
            'keterangan'  => $request->keterangan,
            'lokasi'      => $request->lokasi,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('input_aspirasi.index')->with('success', 'Aspirasi berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aspirasi = InputAspirasi::with(['user', 'kategori'])->findOrFail($id);

        // Security check
        if (Auth::user()->role !== 'admin' && $aspirasi->user_id !== Auth::id()) {
            abort(403, 'Akses Ditolak');
        }

        return view('dashboard.input_aspirasi.show', compact('aspirasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aspirasi = InputAspirasi::findOrFail($id);
        $categories = Kategori::all();

        if (Auth::user()->role !== 'admin' && $aspirasi->user_id !== Auth::id()) {
            abort(403);
        }

        return view('dashboard.input_aspirasi.edit', compact('aspirasi', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan'  => 'required|string',
            'lokasi'      => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $aspirasi = InputAspirasi::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $aspirasi->user_id !== Auth::id()) {
            abort(403);
        }

        $aspirasi->update([
            'keterangan'  => $request->keterangan,
            'lokasi'      => $request->lokasi,
            'kategori_id' => $request->kategori_id,

        ]);

        return redirect()->route('input_aspirasi.index')->with('success', 'Aspirasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aspirasi = InputAspirasi::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $aspirasi->user_id !== Auth::id()) {
            abort(403);
        }

        $aspirasi->delete();
        return redirect()->route('input_aspirasi.index')->with('success', 'Aspirasi berhasil dihapus.');
    }
}
