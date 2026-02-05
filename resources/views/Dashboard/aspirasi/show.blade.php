@extends('layouts.main')
@section('title', 'Detail Aspirasi & Tanggapan')
@section('content')
<div class="p-8 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <div class="p-8 bg-gray-800 text-white flex justify-between items-center">
                <h2 class="text-xl font-bold italic uppercase tracking-tighter">Detail Laporan</h2>
                <span class="px-4 py-1 bg-white text-gray-800 text-xs font-black rounded-full uppercase">{{ $aspirasi->status }}</span>
            </div>

            <div class="p-8 space-y-8">
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black uppercase text-blue-500 tracking-widest">Aspirasi Siswa ({{ $aspirasi->inputAspirasi->user->name }})</label>
                    <div class="bg-blue-50 p-6 rounded-2xl rounded-tl-none border border-blue-100 text-gray-700 italic">
                        "{{ $aspirasi->inputAspirasi->keterangan }}"
                    </div>
                </div>

                <div class="flex flex-col gap-2 items-end text-right">
                    <label class="text-[10px] font-black uppercase text-green-500 tracking-widest">Tanggapan Admin</label>
                    <div class="bg-green-50 p-6 rounded-2xl rounded-tr-none border border-green-100 text-gray-700 w-full md:w-5/6">
                        {{ $aspirasi->tanggapan }}
                    </div>
                </div>
            </div>

            <div class="p-8 bg-gray-50 border-t border-gray-100 text-center">
                <a href="{{ route('aspirasi.index') }}" class="text-sm font-bold text-gray-400 hover:text-gray-600">KEMBALI KE DAFTAR</a>
            </div>
        </div>
    </div>
</div>
@endsection
