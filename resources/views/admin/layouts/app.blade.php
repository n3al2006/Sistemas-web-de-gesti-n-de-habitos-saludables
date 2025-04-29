<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HabitHub Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-emerald-400">🌱 HabitHub Admin</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }} text-white hover:bg-gray-700">
                    <span class="mr-2">📊</span> Dashboard
                </a>
                <a href="{{ route('admin.habits.index') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('admin.habits.*') ? 'bg-gray-700' : '' }} text-gray-300 hover:bg-gray-700">
                    <span class="mr-2">⭐</span> Hábitos Template
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }} text-gray-300 hover:bg-gray-700">
                    <span class="mr-2">👥</span> Usuarios
                </a>
            </nav>

            <div class="mt-auto p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-gray-400 hover:text-white">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>

        <!-- Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>