<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alldata = InputAspirasi::with(['user', 'kategori', 'aspirasi'])->latest()->get();

        return view('dashboard.aspirasi.index', compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Ambil ID dari InputAspirasi yang mau ditanggapi
        $id_input = $request->query('input_id');
        $inputData = InputAspirasi::with('user', 'kategori')->findOrFail($id_input);

        return view('dashboard.aspirasi.create', compact('inputData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'input_aspirasi_id' => 'required|exists:input_aspirasis,id',
        'feedback'          => 'required|string', // Sesuaikan dengan migrasi
        'status'            => 'required|in:menunggu,proses,selesai',
    ]);

    Aspirasi::updateOrCreate(
        ['input_aspirasi_id' => $request->input_aspirasi_id],
        [
            'feedback' => $request->feedback, // Gunakan feedback
            'status'   => $request->status,
        ]
    );

    return redirect()->route('aspirasi.index')->with('success', 'Berhasil memberikan feedback!');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aspirasi = Aspirasi::with('inputAspirasi.user')->findOrFail($id);
        return view('dashboard.aspirasi.show', compact('aspirasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $inputAspirasi = InputAspirasi::with(['user', 'kategori', 'aspirasi'])->findOrFail($id);

        return view('dashboard.aspirasi.edit', compact('inputAspirasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'status'   => 'required|in:menunggu,proses,selesai',
            'feedback' => 'nullable|string',
        ]);

        // Cari atau buat baru data di tabel aspirasis berdasarkan input_aspirasi_id
        Aspirasi::updateOrCreate(
            ['input_aspirasi_id' => $id],
            [
                'status'   => $request->status,
                'feedback' => $request->feedback,
            ]
        );
        // BARIS INI WAJIB ADA:
        return redirect()->route('aspirasi.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->delete();

        return redirect()->route('aspirasi.index')
            ->with('success', 'Tanggapan berhasil dihapus.');
    }
}
