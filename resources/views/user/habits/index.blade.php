<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HabitHub - My Habits</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <!-- ... sidebar content ... -->
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h2 class="text-2xl font-bold mb-6">Mis Hábitos</h2>

            @if($habits->isEmpty())
                <p class="text-gray-500 text-center py-4">
                    No tienes hábitos creados aún. ¡Comienza creando uno!
                </p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($habits as $habit)
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-semibold text-lg">{{ $habit->name }}</h3>
                                @if($habit->isCompletedToday)
                                    <span class="text-green-500">✓</span>
                                @endif
                            </div>
                            <p class="text-gray-600 text-sm mb-3">{{ $habit->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">{{ ucfirst($habit->frequency) }}</span>
                                <button onclick="markComplete('{{ $habit->id }}')" 
                                        id="habit-btn-{{ $habit->id }}"
                                        class="@if($habit->isCompletedToday) bg-gray-400 @else bg-green-500 hover:bg-green-600 @endif text-white px-3 py-1 rounded text-sm"
                                        @if($habit->isCompletedToday) disabled @endif>
                                    {{ $habit->isCompletedToday ? 'Completado' : 'Completar' }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-8">
                <a href="{{ route('user.habits.create') }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Crear Nuevo Hábito
                </a>
            </div>
        </div>
    </div>

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
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const button = document.getElementById(`habit-btn-${habitId}`);
                    button.classList.remove('bg-green-500', 'hover:bg-green-600');
                    button.classList.add('bg-gray-400');
                    button.disabled = true;
                    button.textContent = 'Completado';
                    
                    // Añadir check visual
                    const habitDiv = button.closest('div').parentElement;
                    const header = habitDiv.querySelector('div');
                    if (!header.querySelector('.text-green-500')) {
                        const check = document.createElement('span');
                        check.className = 'text-green-500';
                        check.textContent = '✓';
                        header.appendChild(check);
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>