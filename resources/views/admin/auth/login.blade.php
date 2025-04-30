<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - HabitHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-gray-800 p-8 rounded-lg shadow-xl w-96">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white">Admin Panel</h2>
                <p class="text-gray-400">HabitHub Management</p>
            </div>

            <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                @csrf
                
                @if($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div>
                    <label class="block text-gray-300 mb-2" for="username">Usuario</label>
                    <input type="text" 
                           name="username" 
                           id="username" 
                           class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:outline-none"
                           required>
                </div>

                <div>
                    <label class="block text-gray-300 mb-2" for="password">Contraseña</label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           class="w-full px-4 py-2 rounded bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:outline-none"
                           required>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" 
                           name="remember" 
                           id="remember" 
                           class="rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-blue-500">
                    <label class="ml-2 text-gray-300" for="remember">Recordarme</label>
                </div>

                <button type="submit" 
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
                    Login
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="/" class="text-gray-400 hover:text-white">Back to main site</a>
            </div>
        </div>
    </div>
</body>
</html>