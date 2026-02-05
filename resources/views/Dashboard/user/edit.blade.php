@extends('layouts.main')
@section('title', 'Edit Pengguna')
@section('content')

<div class="min-h-screen bg-gray-100 p-4 md:p-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Edit User</h1>
                <p class="text-gray-500 mt-1">Mengubah informasi untuk pengguna: <span class="text-blue-600 font-bold">{{ $userfind->name }}</span></p>
            </div>
            <a href="{{ route('user.index') }}" class="flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800 transition">
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
            <form action="{{ route('user.update', $userfind->id) }}" method="POST" class="divide-y divide-gray-100">
                @csrf
                @method('PUT')

                <div class="p-8">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-sm">1</span>
                        Informasi Akun
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $userfind->name) }}" placeholder="Masukkan Nama"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email', $userfind->email) }}" placeholder="email@contoh.com"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none">
                        </div>

                        <div class="md:col-span-2 p-4 bg-yellow-50 rounded-xl border border-yellow-100 mb-2">
                            <p class="text-xs text-yellow-700 font-medium italic italic">Kosongkan kolom password di bawah jika Anda tidak ingin mengubahnya.</p>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Password Baru</label>
                            <input type="password" name="password" placeholder="••••••••"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" placeholder="••••••••"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none">
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-gray-50/50">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-sm">2</span>
                        Role & Data Pendidikan
                    </h2>

                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Pilih Role</label>
                            <select name="role" id="role_selector"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none bg-white">
                                <option value="student" {{ old('role', $userfind->role) == 'student' ? 'selected' : '' }}>Student (Siswa)</option>
                                <option value="admin" {{ old('role', $userfind->role) == 'admin' ? 'selected' : '' }}>Admin (Petugas)</option>
                            </select>
                        </div>

                        <div id="student_fields" class="grid grid-cols-1 md:grid-cols-3 gap-6 animate-fadeIn">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-gray-700">NISN</label>
                                <input type="text" name="nisn" value="{{ old('nisn', $userfind->nisn) }}" placeholder="10 digit NISN"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none bg-white">
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-bold text-gray-700">Kelas</label>
                                <select name="kelas"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none bg-white">
                                    <option value="X" {{ old('kelas', $userfind->kelas) == 'X' ? 'selected' : '' }}>Kelas 10</option>
                                    <option value="XI" {{ old('kelas', $userfind->kelas) == 'XI' ? 'selected' : '' }}>Kelas 11</option>
                                    <option value="XII" {{ old('kelas', $userfind->kelas) == 'XII' ? 'selected' : '' }}>Kelas 12</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-bold text-gray-700">Jurusan</label>
                                <input type="text" name="jurusan" value="{{ old('jurusan', $userfind->jurusan) }}" placeholder="Contoh: RPL"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none bg-white">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-xs text-gray-500 italic">* Periksa kembali perubahan sebelum menekan tombol update.</p>
                    <div class="flex gap-4 w-full md:w-auto">
                        <a href="{{ route('user.index') }}" class="flex-1 md:flex-none px-8 py-3 rounded-xl text-gray-600 font-bold hover:bg-gray-200 transition text-center">
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

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
        animation: fadeIn 0.4s ease-out forwards;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelector = document.getElementById('role_selector');
        const studentFields = document.getElementById('student_fields');

        function toggleStudentFields() {
            if (roleSelector.value === 'admin') {
                studentFields.classList.add('hidden');
            } else {
                studentFields.classList.remove('hidden');
            }
        }

        roleSelector.addEventListener('change', toggleStudentFields);
        toggleStudentFields();
    });
</script>

@endsection
