@extends('layouts.main')
@section('title', 'Aspirasi Dashboard')
@section('content')

    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Aspirasi</h1>
            <a href="{{ route('input_aspirasi.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.4 rounded-lg shadow-md transition duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Aspirasi
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Pelapor</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Kategori</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Lokasi</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($alldata as $data)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-gray-900">{{ $data->user->name }}</div>
                                <div class="text-xs text-gray-500 font-mono">{{ $data->user->nisn ?? 'ADMIN' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded-full uppercase">
                                    {{ $data->kategori->nama_kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-700 font-medium">{{ $data->lokasi }}</div>
                                <div class="text-xs text-gray-400 italic">{{ $data->created_at->format('d M Y') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ route('input_aspirasi.show', $data->id) }}"
                                        class="text-blue-600 hover:text-blue-900 font-medium text-sm">Lihat</a>

                                    <a href="{{ route('input_aspirasi.edit', $data->id) }}"
                                        class="text-yellow-600 hover:text-yellow-900 font-medium text-sm">Edit</a>

                                    <form action="{{ route('input_aspirasi.destroy', $data->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Hapus aspirasi ini?')">
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
                <p class="text-gray-500 italic">Belum ada data aspirasi.</p>
            </div>
        @endif
    </div>

@endsection
