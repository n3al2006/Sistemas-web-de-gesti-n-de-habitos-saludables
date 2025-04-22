<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HabitHub - Create New Habit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-emerald-400">🌱 HabitHub</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700">
                    <span class="mr-2">📊</span> Hábitos
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

                <div class="mt-auto p-4 border-t border-gray-700">
                    <div class="flex items-center mb-2">
                        <span class="mr-2">👋</span>
                        <span>Hola, {{ Auth::user()->name }}</span>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="text-sm text-gray-400 hover:text-white">
                        Editar perfil
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold mb-6">Crear Nuevo Hábito</h2>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <form method="POST" action="{{ route('user.habits.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Nombre del Hábito
                            </label>
                            <input class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500" 
                                id="name" 
                                type="text" 
                                name="name" 
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Descripción
                            </label>
                            <textarea class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500" 
                                id="description" 
                                name="description"
                                rows="3"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="frequency">
                                Frecuencia
                            </label>
                            <select class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500"
                                id="frequency" 
                                name="frequency" 
                                required>
                                <option value="daily">Diario</option>
                                <option value="weekly">Semanal</option>
                                <option value="monthly">Mensual</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="reminder_time">
                                Hora del Recordatorio
                            </label>
                            <input class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500" 
                                id="reminder_time" 
                                type="time" 
                                name="reminder_time">
                        </div>

                        <div class="flex justify-between">
                            <a href="{{ route('dashboard') }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2 px-4 rounded">
                                Crear Hábito
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>