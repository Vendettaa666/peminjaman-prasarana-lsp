@extends('layouts.main')
@section('title', 'Dashboard Home')
@section('content')

    <div class="">
        <h1 class="text-xl font-bold p-4">Create Kategori</h1>

        <div class="w-full h-auto bg-gray-300 rounded-lg flex p-4">
            <form action="{{ route('kategori.store') }}" method="POST" class="w-full">
                @csrf
                <div class="w-full flex flex-col mb-4">
                    <label for="nama_kategori" class="font-bold mb-2">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="w-full h-8 rounded-lg p-2"
                        placeholder="Masukkan Nama Kategori">
                </div>
                 <div class="w-full flex flex-col mb-4">
                    <label for="keterangan" class="font-bold mb-2">keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="w-full h-8 rounded-lg p-2"
                        placeholder="Masukkan Keterangan">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="w-32 h-8 rounded-lg bg-blue-500 text-white font-bold">Simpan</button>
                </div>
            </form>
        </div>


    @endsection
