<aside>
    <div class="w-64 h-screen bg-gray-500 p-4 ">
        <h1 class="text-xl font-bold p-4">Dashboard</h1>

        <ul class="mb-4">
            <li class="mb-4">
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-white">Home</a>
            </li>
            @if(Auth::user()->role === 'admin')
                <li class="mb-2">
                    <a href="{{ route('kategori.index') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-white transition">Kategori</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('aspirasi.index') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-white transition">Aspirasi</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('user.index') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-white transition">User</a>
                </li>
            @endif

            <li class="mb-4">
                <a href="{{ route('input_aspirasi.index') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-white">input Aspirasi</a>
            </li>
        </ul>
        <button>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full px-4 py-2 bg-red-600 text-white rounded hover:bg-red-800">Logout</button>
            </form>
        </button>
    </div>
</aside>
