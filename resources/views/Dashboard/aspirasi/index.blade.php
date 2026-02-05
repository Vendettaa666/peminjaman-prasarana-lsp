@extends('layouts.main')
@section('title', 'Manajemen Aspirasi')
@section('content')

<div class="p-8 bg-gray-50 min-h-screen">
    <div class="mb-8">
        <h1 class="text-2xl font-black text-gray-800 uppercase italic">Manajemen Seluruh Aspirasi</h1>
        <p class="text-gray-500">Kelola dan tanggapi semua masukan dari siswa.</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold uppercase">Siswa</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase">Isi Laporan</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase">Status saat ini</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($alldata as $data)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-800">{{ $data->user->name }}</div>
                        <div class="text-[10px] text-blue-500 font-bold uppercase">{{ $data->kategori->nama_kategori }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 line-clamp-1 italic">"{{ $data->keterangan }}"</p>
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $status = $data->aspirasi->status ?? 'menunggu';
                            $color = [
                                'menunggu' => 'bg-gray-100 text-gray-600',
                                'proses'   => 'bg-yellow-100 text-yellow-700',
                                'selesai'  => 'bg-green-100 text-green-700'
                            ][$status];
                        @endphp
                        <span class="px-3 py-1 text-[10px] font-black rounded-full uppercase {{ $color }}">
                            {{ $status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('aspirasi.edit', $data->id) }}" class="px-4 py-2 bg-blue-600 text-white text-xs font-bold rounded-lg hover:bg-blue-700 transition">
                            Proses & Tanggapi
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
