@extends('layouts.main')
@section('title', 'Beri Tanggapan')
@section('content')

<div class="p-8 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('input_aspirasi.index') }}" class="text-gray-500 hover:text-gray-700"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg></a>
            <h1 class="text-2xl font-extrabold text-gray-800">Beri Tanggapan Admin</h1>
        </div>

        <div class="bg-blue-600 rounded-xl p-6 mb-6 text-white shadow-lg">
            <h2 class="text-xs font-black uppercase tracking-widest opacity-70 mb-2">Aspirasi Dari: {{ $inputData->user->name }}</h2>
            <p class="italic text-lg">"{{ $inputData->keterangan }}"</p>
            <div class="mt-4 text-xs font-bold bg-blue-700 inline-block px-3 py-1 rounded">Lokasi: {{ $inputData->lokasi }}</div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('aspirasi.store') }}" method="POST" class="p-8">
                @csrf
                <input type="hidden" name="input_aspirasi_id" value="{{ $inputData->id }}">

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2 block">Status Progres</label>
                        <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                            <option value="menunggu">Menunggu</option>
                            <option value="proses">Sedang Diproses</option>
                            <option value="selesai">Selesai / Teratasi</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2 block">Tanggapan / Solusi</label>
                        <textarea name="feedback" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Tuliskan tindakan atau jawaban admin..."></textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <button type="submit" class="px-10 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-bold shadow-md transition duration-200">
                        Simpan Tanggapan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
