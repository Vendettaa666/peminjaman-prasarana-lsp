@extends('layouts.main')
@section('content')
<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Edit Kategori</h1>

    <div class="bg-gray-300 rounded-lg p-4">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col mb-4">
                <label class="font-bold mb-2">Nama Kategori</label>
                <input type="text" name="nama_kategori"
                       value="{{ $kategori->nama_kategori }}"
                       class="w-full h-8 rounded-lg p-2">
            </div>

            <div class="flex flex-col mb-4">
                <label class="font-bold mb-2">Keterangan</label>
                <textarea name="keterangan" class="w-full rounded-lg p-2">{{ $kategori->keterangan }}</textarea>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('kategori.index') }}" class="bg-gray-500 text-white px-4 py-1 rounded-lg">Batal</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded-lg">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection



@extends('layouts.main')
@section('title', 'Edit Pengguna')
@section('content')

<div class="min-h-screen bg-gray-100 p-4 md:p-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Edit Kategori</h1>
                {{-- <p class="text-gray-500 mt-1">Mengubah informasi untuk pengguna: <span class="text-blue-600 font-bold">{{ $userfind->name }}</span></p> --}}
            </div>
            <a href="{{ route('kategori.index') }}" class="flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Daftar
            </a>
        </div>

        @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Mohon perbaiki kesalahan berikut:</h3>
                    <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="divide-y divide-gray-100">
                @csrf
                @method('PUT')

                <div class="p-8">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                        {{-- <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-sm">1</span> --}}
                        Informasi Kategori
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Keterangan</label>
                            <input type="text" name="nama_kategori" value="{{ old('name_kategori', $kategori->name_kategori) }}" placeholder="Masukkan Nama Kategori"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Keterangan</label>
                            <input type="text" name="keterangan" value="{{ old('keterangan', $kategori->keterangan) }}" placeholder="example: Kategori untuk ..."
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none">
                        </div>


                </div>

                <div class="p-8 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-xs text-gray-500 italic">* Periksa kembali perubahan sebelum menekan tombol update.</p>
                    <div class="flex gap-4 w-full md:w-auto">
                        <a href="{{ route('kategori.index') }}" class="flex-1 md:flex-none px-8 py-3 rounded-xl text-gray-600 font-bold hover:bg-gray-200 transition text-center">
                            Batal
                        </a>
                        <button type="submit" class="flex-1 md:flex-none px-12 py-3 rounded-xl bg-blue-600 text-white font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all duration-200">
                            Update User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
