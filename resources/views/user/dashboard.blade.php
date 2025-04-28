<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HabitHub - Dashboard</title>
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
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 bg-gray-700 text-white">
                    <span class="mr-2">📊</span> Hábitos
                </a>
                <a href="{{ route('user.habits.recommended') }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700">
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

                <div class="mt-auto p-4 border-t border-gray-700">
                    <div class="flex items-center mb-2">
                        <span class="mr-2">👋</span>
                        <span>Hola, {{ Auth::user()->name }}</span>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="text-sm text-gray-400 hover:text-white">
                        Editar perfil
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="text-sm text-gray-400 hover:text-white">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <div class="p-8">
                <div class="mb-6">
                    <input type="text" placeholder="Buscar hábitos, desafíos o recetas..." 
                           class="w-full px-4 py-2 rounded-lg border shadow-sm">
                </div>

                <!-- Habits Section -->
                <section class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Gestión de Hábitos</h2>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Actualizar la clase del contenedor del hábito -->
                        @foreach($habits as $habit)
                        <div class="@if($habit->isCompletedToday) bg-green-50 @else bg-white @endif p-4 rounded-lg shadow transition-colors duration-300"
                             id="habit-container-{{ $habit->id }}">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <span class="@if($habit->isCompletedToday) text-emerald-600 @else text-green-500 @endif mr-2">🌿</span>
                                    <h3 class="font-semibold">{{ $habit->name }}</h3>
                                </div>
                                @if($habit->isCompletedToday)
                                    <span class="bg-emerald-100 text-emerald-600 px-2 py-1 rounded-full text-xs">✓</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 mb-3">{{ $habit->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">{{ ucfirst($habit->frequency) }}</span>
                                <button onclick="markComplete('{{ $habit->id }}')" 
                                        id="habit-btn-{{ $habit->id }}"
                                        class="@if($habit->isCompletedToday) bg-gray-400 @else bg-emerald-500 hover:bg-emerald-600 @endif text-white px-3 py-1 rounded text-sm transition-all duration-300"
                                        @if($habit->isCompletedToday) disabled @endif>
                                    {{ $habit->isCompletedToday ? '✓ Completado' : 'Completar' }}
                                </button>
                            </div>
                        </div>
                        @endforeach
                        
                        <!-- Actualizar el script -->
                        
                            <script>
                                function markComplete(habitId) {
                                    fetch(`/user/habits/${habitId}/progress`, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            completed: true
                                        })
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Network response was not ok');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        if (data.success) {
                                            // Actualizar el contenedor del hábito
                                            const container = document.getElementById(`habit-container-${habitId}`);
                                            container.classList.remove('bg-white');
                                            container.classList.add('bg-green-50');
                                            
                                            // Actualizar el botón
                                            const button = document.getElementById(`habit-btn-${habitId}`);
                                            button.classList.remove('bg-emerald-500', 'hover:bg-emerald-600');
                                            button.classList.add('bg-gray-400');
                                            button.disabled = true;
                                            button.textContent = '✓ Completado';
                                            
                                            // Añadir el check de completado
                                            const header = container.querySelector('.flex.items-center.justify-between');
                                            if (!header.querySelector('.bg-emerald-100')) {
                                                const check = document.createElement('span');
                                                check.className = 'bg-emerald-100 text-emerald-600 px-2 py-1 rounded-full text-xs';
                                                check.textContent = '✓';
                                                header.appendChild(check);
                                            }
                                            
                                            // Actualizar el ícono
                                            const icon = header.querySelector('.flex.items-center span:first-child');
                                            icon.classList.remove('text-green-500');
                                            icon.classList.add('text-emerald-600');
                                            
                                            // Actualizar el contador de hábitos completados
                                            const completedCount = document.querySelector('.bg-yellow-100 h3');
                                            const currentCount = parseInt(completedCount.textContent.split(' ')[0]) + 1;
                                            completedCount.textContent = `${currentCount} hábitos completados`;
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('Error al actualizar el hábito. Por favor, intenta de nuevo.');
                                    });
                                }
                            </script>
                        
                        <a href="{{ route('user.habits.create') }}" 
                           class="bg-cyan-400 p-4 rounded-lg shadow hover:bg-cyan-500 transition text-white text-center flex flex-col justify-center">
                            <span class="text-2xl mb-2">+</span>
                            <span>Crear Hábito</span>
                            <span class="text-sm">Personaliza tus propias metas diarias.</span>
                        </a>
                    </div>
                </section>

                <!-- Daily Challenges -->
                <section class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Desafíos Diarios</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center mb-2">
                                <span class="text-blue-500 mr-2">💧</span>
                                <h3 class="font-semibold">2L de Agua</h3>
                            </div>
                            <p class="text-sm text-gray-600">Bebe activo toda la semana.</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center mb-2">
                                <span class="text-green-500 mr-2">👣</span>
                                <h3 class="font-semibold">5,000 pasos</h3>
                            </div>
                            <p class="text-sm text-gray-600">Mantente en movimiento.</p>
                        </div>
                    </div>
                </section>

                <!-- Progress Stats -->
                <section>
                    <h2 class="text-xl font-semibold mb-4">Tu Progreso</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-yellow-100 p-4 rounded-lg">
                            <div class="flex items-center">
                                <span class="text-2xl mr-2">🎯</span>
                                <div>
                                    <h3 class="font-semibold">{{ $streakCount }} días seguidos</h3>
                                    <p class="text-sm text-gray-600">¡Buen ritmo!</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded-lg">
                            <div class="flex items-center">
                                <span class="text-2xl mr-2">✅</span>
                                <div>
                                    <h3 class="font-semibold" id="completed-habits-count">
                                        {{ $completedToday }} hábitos completados hoy
                                    </h3>
                                    <p class="text-sm text-gray-600">¡Sigue así!</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded-lg">
                            <div class="flex items-center">
                                <span class="text-2xl mr-2">🏆</span>
                                <div>
                                    <h3 class="font-semibold">5 desafíos superados</h3>
                                    <p class="text-sm text-gray-600">¡Excelente trabajo!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>