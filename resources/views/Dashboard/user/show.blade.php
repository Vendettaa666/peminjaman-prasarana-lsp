@extends('layouts.main')
@section('title', 'Detail User - ' . $userfind->name)
@section('content')

<div class="min-h-screen bg-gray-50 p-4 md:p-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('user.index') }}" class="p-2 bg-white rounded-full shadow-sm text-gray-500 hover:text-blue-600 transition border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl font-extrabold text-gray-900 italic uppercase">User Profile</h1>
                    <p class="text-sm text-gray-500">ID Pengguna: <span class="font-mono text-blue-600">#{{ $userfind->id }}</span></p>
                </div>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('user.edit', $userfind->id) }}" class="px-6 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-xl shadow-md transition text-center text-sm">
                    Edit Data
                </a>
                <form action="{{ route('user.destroy', $userfind->id) }}" method="POST" onsubmit="return confirm('Hapus user ini secara permanen?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2.5 bg-red-100 text-red-600 hover:bg-red-600 hover:text-white font-bold rounded-xl transition text-sm">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
                    {{-- <div class="w-28 h-28 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full mx-auto flex items-center justify-center text-white text-4xl font-black mb-4 shadow-lg">
                        {{ strtoupper(substr($userfind->name, 0, 1)) }}
                    </div> --}}
                    <h2 class="text-xl font-bold text-gray-800 break-words">{{ $userfind->name }}</h2>
                    <p class="text-gray-500 text-sm mb-6">{{ $userfind->email }}</p>

                    @if($userfind->role === 'admin')
                        <span class="px-4 py-1.5 bg-purple-100 text-purple-700 text-[10px] font-black rounded-full uppercase tracking-widest border border-purple-200">Administrator</span>
                    @else
                        <span class="px-4 py-1.5 bg-green-100 text-green-700 text-[10px] font-black rounded-full uppercase tracking-widest border border-green-200">Student</span>
                    @endif
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-gray-400 text-[10px] font-black uppercase mb-4 tracking-widest">Metadata Akun</h3>
                    <div class="space-y-4">
                        <div>
                            <span class="text-xs text-gray-400 block">Dibuat pada:</span>
                            <span class="text-sm font-bold text-gray-700">{{ $userfind->created_at->translatedFormat('d F Y') }}</span>
                        </div>
                        <div>
                            <span class="text-xs text-gray-400 block">Update Terakhir:</span>
                            <span class="text-sm font-bold text-gray-700">{{ $userfind->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50/50 border-b border-gray-100 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <h3 class="font-bold text-gray-700 text-sm">Informasi Identitas</h3>
                    </div>
                    <div class="p-8 grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div>
                            <label class="text-[10px] text-gray-400 uppercase font-black tracking-wider">Nama Lengkap</label>
                            <p class="text-gray-800 font-bold mt-1 text-lg">{{ $userfind->name }}</p>
                        </div>
                        <div>
                            <label class="text-[10px] text-gray-400 uppercase font-black tracking-wider">Alamat Email</label>
                            <p class="text-gray-800 font-bold mt-1 text-lg">{{ $userfind->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50/50 border-b border-gray-100 flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h3 class="font-bold text-gray-700 text-sm">Detail Akademik</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        @if($userfind->role === 'admin')
                            <div class="flex flex-col items-center justify-center py-6 text-center">
                                <div class="bg-gray-100 p-3 rounded-full mb-3 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium italic text-sm">Data akademik tidak berlaku untuk Administrator.</p>
                            </div>
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                                <div>
                                    <label class="text-[10px] text-gray-400 uppercase font-black tracking-wider">NISN</label>
                                    <p class="text-gray-800 font-mono font-black mt-1 text-xl">{{ $userfind->nisn ?? '---' }}</p>
                                </div>
                                <div>
                                    <label class="text-[10px] text-gray-400 uppercase font-black tracking-wider">Kelas</label>
                                    <p class="text-gray-800 font-bold mt-1 text-xl">{{ $userfind->kelas ?? '---' }}</p>
                                </div>
                                <div>
                                    <label class="text-[10px] text-gray-400 uppercase font-black tracking-wider">Jurusan</label>
                                    <p class="text-gray-800 font-bold mt-1 text-xl">{{ $userfind->jurusan ?? '---' }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
