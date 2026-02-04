
@extends('layouts.main')
@section('content')
<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Detail Kategori</h1>
    <div class="bg-white shadow rounded-lg p-6">
        <p><strong>ID:</strong> {{ $kategori->id }}</p>
        <p><strong>Nama:</strong> {{ $kategori->nama_kategori }}</p>
        <p><strong>Keterangan:</strong> {{ $kategori->keterangan }}</p>
        <a href="{{ route('kategori.index') }}" class="mt-4 inline-block text-blue-500 underline">Kembali</a>
    </div>
</div>
@endsection
