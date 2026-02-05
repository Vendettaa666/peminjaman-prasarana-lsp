@extends('layouts.main')
@section('title', 'Create User')
@section('content')

<div class="p-8 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('user.index') }}" class="text-gray-500 hover:text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-extrabold text-gray-800">Tambah Pengguna Baru</h1>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm transition">
                <p class="font-bold mb-1">Terjadi kesalahan:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('user.store') }}" method="POST" class="p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col">
                        <label for="name" class="text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="Contoh: John Doe">
                    </div>

                    <div class="flex flex-col">
                        <label for="email" class="text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="email@sekolah.sch.id">
                    </div>

                    <div class="flex flex-col">
                        <label for="password" class="text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="••••••••">
                    </div>

                    <div class="flex flex-col">
                        <label for="password_confirmation" class="text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="••••••••">
                    </div>

                    <div class="flex flex-col md:col-span-2">
                        <label for="role" class="text-sm font-semibold text-gray-700 mb-2">Role Pengguna</label>
                        <select name="role" id="role"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none bg-white transition">
                            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student (Siswa)</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (Petugas)</option>
                        </select>
                    </div>

                    <div id="student-section" class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-gray-100">
                        <div class="flex flex-col">
                            <label for="nisn" class="text-sm font-semibold text-gray-700 mb-2">NISN</label>
                            <input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none"
                                placeholder="Masukkan NISN">
                        </div>
                        <div class="flex flex-col">
                            <label for="kelas" class="text-sm font-semibold text-gray-700 mb-2">Kelas</label>
                            <select name="kelas" id="kelas" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
                                <option value="X">Kelas 10</option>
                                <option value="XI">Kelas 11</option>
                                <option value="XII">Kelas 12</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="jurusan" class="text-sm font-semibold text-gray-700 mb-2">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none"
                                placeholder="Contoh: RPL, TKJ">
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex justify-end gap-3">
                    <button type="reset" class="px-6 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 transition font-semibold">
                        Reset
                    </button>
                    <button type="submit" class="px-10 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-bold shadow-md shadow-blue-200 transition duration-200">
                        Simpan User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role');
        const studentSection = document.getElementById('student-section');

        function toggleFields() {
            if (roleSelect.value === 'admin') {
                studentSection.classList.add('hidden');
            } else {
                studentSection.classList.remove('hidden');
            }
        }

        roleSelect.addEventListener('change', toggleFields);
        toggleFields(); // Jalankan saat halaman pertama kali dimuat
    });
</script>

@endsection
