@extends('layouts.main')
@section('title', 'Dashboard Home')
@section('content')

    <div class="">
        <h1 class="text-xl font-bold p-4">Kategori</h1>

        <a href="{{ route('kategori.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-4 inline-block">
            + Tambah Kategori
        </a>

        <div class="w-full h-auto bg-gray-300 rounded-lg flex p-4">
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Nama Kategori</th>
                        <th class="border px-4 py-2">Keterangan</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alldata as $data)
                        <tr>
                            <td class="border px-4 py-2">{{ $data->id }}</td>
                            <td class="border px-4 py-2">{{ $data->nama_kategori }}</td>
                            <td class="border px-4 py-2">{{ $data->keterangan }}</td>
                            <td class="border px-4 py-2 flex gap-2 justify-center">
                                <a href="{{ route('kategori.edit', $data->id) }}"
                                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                                    Edit
                                </a>
                                <a href="{{ route('kategori.show', $data->id) }}"
                                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                                    Show
                                </a>
                                <form action="{{ route('kategori.destroy', $data->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection
