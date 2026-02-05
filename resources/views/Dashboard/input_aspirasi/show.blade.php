@extends('layouts.main')
@section('title', 'Detail Aspirasi')
@section('content')
<div class="min-h-screen bg-gray-50 p-4 md:p-8 flex justify-center">
    <div class="max-w-3xl w-full">
        <div class="flex items-center gap-4 mb-6 text-gray-500">
            <a href="{{ route('input_aspirasi.index') }}" class="p-2 bg-white rounded-full shadow-sm hover:text-blue-600 transition"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg></a>
            <span class="font-bold uppercase text-sm tracking-widest">Detail Aspirasi #{{ $aspirasi->id }}</span>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 border-b border-gray-100 flex justify-between items-start">
                <div>
                    <span class="px-4 py-1.5 bg-blue-600 text-white text-[10px] font-black rounded-full uppercase tracking-widest">{{ $aspirasi->kategori->nama_kategori }}</span>
                    <h1 class="text-2xl font-bold text-gray-800 mt-4">{{ $aspirasi->lokasi }}</h1>
                    <p class="text-gray-400 text-sm">Dikirim pada {{ $aspirasi->created_at->format('d F Y, H:i') }} WIB</p>
                </div>
                <div class="text-right">
                    <div class="text-xs font-black uppercase text-gray-400">Status</div>
                    <div class="text-blue-600 font-bold italic">TERKIRIM</div>
                </div>
            </div>

            <div class="p-8 space-y-8">
                <div>
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest block mb-2">Informasi Pelapor</label>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-2xl">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full font-bold text-xl">{{ substr($aspirasi->user->name, 0, 1) }}</div>
                        <div>
                            <div class="font-bold text-gray-800">{{ $aspirasi->user->name }}</div>
                            <div class="text-xs text-gray-500 font-mono">NISN: {{ $aspirasi->user->nisn ?? '-' }}</div>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest block mb-2">Isi Aspirasi</label>
                    <div class="p-6 bg-white border border-gray-100 rounded-2xl text-gray-700 leading-relaxed shadow-inner italic">
                        "{{ $aspirasi->keterangan }}"
                    </div>
                </div>

                <form action="{{ route('input_aspirasi.destroy', $aspirasi->id) }}" method="POST" onsubmit="return confirm('Hapus aspirasi ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-4 text-red-600 font-bold hover:bg-red-50 rounded-2xl transition">Hapus Aspirasi Ini</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
