@extends('layouts.main')
@section('title', 'Proses Aspirasi')
@section('content')

<div class="p-8 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="p-8 bg-gray-800 text-white">
                <span class="text-xs font-bold text-blue-400 uppercase tracking-widest">Detail Laporan Siswa</span>
                <h2 class="text-xl font-black mt-2 italic uppercase">{{ $inputAspirasi->user->name }}</h2>
            </div>

            <div class="p-8">
                <div class="mb-8 p-6 bg-gray-50 rounded-xl border-l-4 border-blue-500 italic text-gray-600">
                    "{{ $inputAspirasi->keterangan }}"
                </div>

                <form action="{{ route('aspirasi.update', $inputAspirasi->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="text-xs font-black uppercase text-gray-400 mb-2 block">Update Status</label>
                        <select name="status" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none transition">
                            <option value="menunggu" {{ ($inputAspirasi->aspirasi->status ?? '') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="proses" {{ ($inputAspirasi->aspirasi->status ?? '') == 'proses' ? 'selected' : '' }}>Sedang Diproses</option>
                            <option value="selesai" {{ ($inputAspirasi->aspirasi->status ?? '') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-xs font-black uppercase text-gray-400 mb-2 block">Feedback / Tanggapan Admin</label>
                        <textarea name="feedback" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Tuliskan feedback di sini...">{{ $inputAspirasi->aspirasi->feedback ?? '' }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 py-3 bg-blue-600 text-white font-black rounded-xl hover:bg-blue-700 transition shadow-lg">SIMPAN PERUBAHAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
