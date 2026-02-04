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
