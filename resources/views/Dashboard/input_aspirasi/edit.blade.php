@extends('layouts.main')
@section('title', 'Edit Aspirasi')
@section('content')
<div class="min-h-screen bg-gray-100 p-4 md:p-8 flex items-center justify-center">
    <div class="max-w-2xl w-full bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8 bg-yellow-500 text-white">
            <h2 class="text-2xl font-black uppercase italic tracking-tighter">Edit Aspirasi</h2>
            <p class="text-yellow-100 text-sm">Perbarui informasi aspirasi yang telah dikirim.</p>
        </div>

        <form action="{{ route('input_aspirasi.update', $aspirasi->id) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="text-xs font-black uppercase text-gray-400 tracking-widest block mb-2">Kategori</label>
                <select name="kategori_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $aspirasi->kategori_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-xs font-black uppercase text-gray-400 tracking-widest block mb-2">Lokasi</label>
                <input type="text" name="lokasi" value="{{ $aspirasi->lokasi }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none transition">
            </div>

            <div>
                <label class="text-xs font-black uppercase text-gray-400 tracking-widest block mb-2">Keterangan</label>
                <textarea name="keterangan" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none transition">{{ $aspirasi->keterangan }}</textarea>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="w-full px-6 py-3 bg-yellow-500 text-white font-bold rounded-xl shadow-lg hover:bg-yellow-600 transition">Update Aspirasi</button>
            </div>
        </form>
    </div>
</div>
@endsection
