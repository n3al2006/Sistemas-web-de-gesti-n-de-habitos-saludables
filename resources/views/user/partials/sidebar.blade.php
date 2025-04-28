<div class="w-64 bg-gray-800 text-white">
    <div class="p-4">
        <h1 class="text-2xl font-bold text-emerald-400">🌱 HabitHub</h1>
    </div>
    <nav class="mt-4">
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }} text-white hover:bg-gray-700">
            <span class="mr-2">📊</span> Hábitos
        </a>
        <a href="{{ route('user.habits.recommended') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('user.habits.recommended') ? 'bg-gray-700' : '' }} text-gray-300 hover:bg-gray-700">
            <span class="mr-2">⭐</span> Recomendados
        </a>
        <a href="#" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700">
            <span class="mr-2">🎯</span> Desafíos
        </a>
        <a href="#" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700">
            <span class="mr-2">📈</span> Progreso
        </a>
        <a href="#" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700">
            <span class="mr-2">🥗</span> Recetas
        </a>
    </nav>

    <div class="mt-auto p-4 border-t border-gray-700">
        <div class="flex items-center mb-2">
            <span class="mr-2">👋</span>
            <span>Hola, {{ Auth::user()->name }}</span>
        </div>
        <a href="{{ route('profile.edit') }}" class="text-sm text-gray-400 hover:text-white block">
            Editar perfil
        </a>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="text-sm text-gray-400 hover:text-white">
                Cerrar Sesión
            </button>
        </form>
    </div>
</div>