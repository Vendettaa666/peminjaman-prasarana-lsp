@extends('layouts.main')
@section('title', 'Kirim Aspirasi')
@section('content')

<div class="p-8 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('input_aspirasi.index') }}" class="text-gray-500 hover:text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-extrabold text-gray-800">Sampaikan Aspirasi Baru</h1>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm transition">
                <p class="font-bold mb-1">Terjadi kesalahan:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-blue-50 px-8 py-4 border-b border-blue-100 flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-black uppercase text-blue-400 tracking-widest block">Pelapor</span>
                    <span class="text-sm font-bold text-blue-700">{{ Auth::user()->name }}</span>
                </div>
                <div class="text-right">
                    <span class="text-[10px] font-black uppercase text-blue-400 tracking-widest block">NISN / ID</span>
                    <span class="text-sm font-bold text-blue-700">{{ Auth::user()->nisn ?? 'Petugas' }}</span>
                </div>
            </div>

            <form action="{{ route('input_aspirasi.store') }}" method="POST" class="p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col md:col-span-2">
                        <label for="kategori_id" class="text-sm font-semibold text-gray-700 mb-2">Kategori Aspirasi</label>
                        <select name="kategori_id" id="kategori_id"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none bg-white transition">
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('kategori_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col md:col-span-2">
                        <label for="lokasi" class="text-sm font-semibold text-gray-700 mb-2">Lokasi Kejadian / Objek</label>
                        <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none transition"
                            placeholder="Contoh: Kantin Sekolah, Lab Komputer, Kamar Mandi">
                    </div>

                    <div class="flex flex-col md:col-span-2">
                        <label for="keterangan" class="text-sm font-semibold text-gray-700 mb-2">Detail Aspirasi</label>
                        <textarea name="keterangan" id="keterangan" rows="5"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none transition"
                            placeholder="Ceritakan secara detail keluhan atau saran Anda...">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="mt-10 flex justify-end gap-3 border-t border-gray-100 pt-6">
                    <button type="reset" class="px-6 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 transition font-semibold">
                        Reset
                    </button>
                    <button type="submit" class="px-10 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-bold shadow-md shadow-blue-200 transition duration-200">
                        Kirim Aspirasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
