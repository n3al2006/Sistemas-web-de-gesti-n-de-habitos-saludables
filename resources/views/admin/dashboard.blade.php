<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - HabitHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-gray-800 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold">HabitHub Admin</h1>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">Logout</button>
                </form>
            </div>
        </nav>

        <div class="container mx-auto p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Total Users</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Total Habits</h3>
                    <p class="text-3xl font-bold text-green-600">{{ $totalHabits }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Active Habits</h3>
                    <p class="text-3xl font-bold text-purple-600">{{ $activeHabits }}</p>
                </div>
            </div>

            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4"> Acciones</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('admin.habits.index') }}" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition">
                        <h3 class="text-lg font-semibold">Administrar Hábitos</h3>
                        <p class="text-gray-600">Ver y Administrar todos los háitos</p>
                    </a>
                    <a href="{{ route('admin.users.progress') }}" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition">
                        <h3 class="text-lg font-semibold">Progreso de cada usuario </h3>
                        <p class="text-gray-600">Monitorear el progreso del usuario</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>