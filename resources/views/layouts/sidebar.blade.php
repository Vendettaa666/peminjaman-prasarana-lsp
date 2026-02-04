<aside class="w-64 bg-gray-800 text-white min-h-screen flex flex-col">
    <div class="h-16 flex items-center justify-center border-b border-gray-700">
        <h1 class="text-2xl font-bold">My App</h1>
    </div>

    <nav class="flex-1 px-2 py-4 space-y-2">
        <a href="{{ route('dashboard') }}"
           class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
            Dashboard
        </a>

        <a href="#"
           class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
            Profile
        </a>

        <a href="#"
           class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
            Settings
        </a>
    </nav>

    <div class="p-4 border-t border-gray-700">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-md transition-colors">
                Logout
            </button>
        </form>
    </div>
</aside>
