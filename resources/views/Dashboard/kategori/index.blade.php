

@extends('layouts.main')
@section('title', 'Kategori Dashboard')
@section('content')

    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Kategori</h1>
            <a href="{{ route('kategori.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.4 rounded-lg shadow-md transition duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Kategori
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">ID</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Nama Kategori</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Keterangan</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($alldata as $data)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 text-sm text-gray-500">#{{ $data->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-gray-900">{{ $data->nama_kategori }}</div>

                            </td>
                            <td class="px-6 py-4">
                                <div class="text-xs text-gray-500">{{ $data->keterangan }}</div>
                            </td>

                            {{-- <td class="px-6 py-4">
                        @if ($data->role === 'admin')
                            <span class="px-3 py-1 text-xs font-medium bg-purple-100 text-purple-700 rounded-full uppercase">Admin</span>
                        @else
                            <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full uppercase">Student</span>
                        @endif
                    </td> --}}
                            {{-- <td class="px-6 py-4">
                        @if ($data->role === 'admin')
                            <span class="text-sm text-gray-400 italic">N/A</span>
                        @else
                            <div class="text-sm text-gray-700 font-medium">{{ $data->nisn }}</div>
                            <div class="text-xs text-gray-500">{{ $data->kelas }} - {{ $data->jurusan }}</div>
                        @endif
                    </td> --}}
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ route('kategori.show', $data->id) }}"
                                        class="text-blue-600 hover:text-blue-900 font-medium text-sm">Lihat</a>
                                    <a href="{{ route('kategori.edit', $data->id) }}"
                                        class="text-yellow-600 hover:text-yellow-900 font-medium text-sm">Edit</a>

                                    <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 font-medium text-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($alldata->isEmpty())
            <div class="text-center py-10">
                <p class="text-gray-500 italic">Belum ada data kategori.</p>
            </div>
        @endif
    </div>

@endsection
