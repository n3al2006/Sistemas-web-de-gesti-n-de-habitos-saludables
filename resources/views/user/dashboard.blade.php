<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HabitHub - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard-user.css') }}">
</head>
<body>
    <button class="theme-toggle" onclick="toggleTheme()">🌓</button>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>🌱 HabitHub</h2>
            <nav>
                <ul>
                    <li><a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i>📊</i>Hábitos</a></li>
                    <li><a href="{{ route('user.habits.recommended') }}" class="nav-item {{ request()->routeIs('user.habits.recommended') ? 'active' : '' }}"><i>⭐</i>Recomendados</a></li>
                    <li><a href="{{ route('habits.challenge.index') }}" class="nav-item {{ request()->routeIs('habits.challenge.index') ? 'active' : '' }}"><i>🎯</i>Desafíos</a></li>
                    <li><a href="{{ route('habits.showProgress') }} " class="nav-item {{ request()->routeIs('habits.showProgress') ? 'active' : '' }}"><i>📈</i>Progreso</a></li>
                    <li><a href="{{ route('habits.indexRece') }}" class="nav-item {{ request()->routeIs('habits.indexRece') ? 'active' : '' }}"><i>🥗</i>Recetas</a></li>
                </ul>
            </nav>

            <div class="user-section">
                <div class="user-info">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="User Avatar">
                    <div class="details">
                        <h3>{{ Auth::user()->name }}</h3>
                        <p>Miembro activo</p>
                        <span>Nivel Saludable</span>
                    </div>
                </div>
                <ul class="user-options">
                    <li><a href="{{ route('profile.edit') }}" class="user-option-link"><i>👤</i>Editar perfil</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="user-option-link"><i>🚪</i>Cerrar Sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="top-bar">
                <input type="text" placeholder="Buscar hábitos, desafíos o recetas...">
                <i>🔍</i>
            </div>

            @if($notifications->count() > 0)
            <div class="section">
                <div class="card">
                    <h3>📬 Notificaciones</h3>
                    <div class="notification-list">
                        @foreach($notifications as $notification)
                        <div class="notification-item">
                            <div class="notification-content">
                                <h4>{{ $notification->title }}</h4>
                                <p>{{ $notification->message }}</p>
                                <span>{{ $notification->created_at->diffForHumans() }}</span>
                            </div>
                            <form action="{{ route('notifications.mark-as-read', $notification) }}" method="POST">
                                @csrf
                                <button type="submit" class="mark-read-btn">Marcar como leída</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <div class="section">
                <h1>Gestión de Hábitos</h1>
                <div class="card-grid">
                    @foreach($habits as $habit)
                    <div class="card" id="habit-container-{{ $habit->id }}">
                        <div class="habit-header">
                            <div class="habit-title">
                                <span class="habit-icon">🌿</span>
                                <h3>{{ $habit->name }}</h3>
                            </div>
                            @if($habit->isCompletedToday)
                                <span class="completed-badge">✓</span>
                            @endif
                        </div>
                        <p>{{ $habit->description }}</p>
                        <div class="habit-footer">
                            <span class="frequency">{{ ucfirst($habit->frequency) }}</span>
                            <button onclick="markComplete('{{ $habit->id }}')" 
                                    id="habit-btn-{{ $habit->id }}"
                                    class="complete-btn {{ $habit->isCompletedToday ? 'completed' : '' }}"
                                    {{ $habit->isCompletedToday ? 'disabled' : '' }}>
                                {{ $habit->isCompletedToday ? '✓ Completado' : 'Completar' }}
                            </button>
                        </div>
                    </div>
                    @endforeach

                    <a style="text-decoration:none;" href="{{ route('user.habits.create') }}" class="card add-habit">
                        <span class="add-icon">+</span>
                        <h3>Crear Hábito</h3>
                        <p>Personaliza tus propias metas diarias</p>
                    </a>
                </div>
            </div>

            <div class="section">
                <h1>Desafíos Diarios</h1>
                <div class="card-grid">
                    <div class="card">
                        <div class="challenge-header">
                            <span class="challenge-icon">💧</span>
                            <h3>2L de Agua</h3>
                        </div>
                        <p>Bebe activo toda la semana</p>
                    </div>
                    <div class="card">
                        <div class="challenge-header">
                            <span class="challenge-icon">👣</span>
                            <h3>5,000 pasos</h3>
                        </div>
                        <p>Mantente en movimiento</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h1>Tu Progreso</h1>
                <div class="progress-container">
                    <div class="stat">
                        <h3>{{ $streakCount }} días seguidos</h3>
                        <p>¡Buen ritmo! 🎯</p>
                    </div>
                    <div class="stat">
                        <h3>{{ $completedToday }} hábitos completados</h3>
                        <p>¡Sigue así! ✅</p>
                    </div>
                    <div class="stat">
                        <h3>5 desafíos superados</h3>
                        <p>¡Excelente trabajo! 🏆</p>
                    </div>
                </div>
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
                    const container = document.getElementById(`habit-container-${habitId}`);
                    const button = document.getElementById(`habit-btn-${habitId}`);
                    
                    container.classList.add('completed');
                    button.classList.add('completed');
                    button.disabled = true;
                    button.textContent = '✓ Completado';
                    
                    // Actualizar el contador correcto de hábitos completados
                    const habitsCompletedCounter = document.querySelector('.stat:nth-child(2) h3');
                    const currentCompleted = parseInt(habitsCompletedCounter.textContent);
                    habitsCompletedCounter.textContent = `${currentCompleted + 1} hábitos completados`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al actualizar el hábito. Por favor, intenta de nuevo.');
            });
        }

        function toggleTheme() {
            document.body.classList.toggle('light-theme');
        }
    </script>
</body>
</html>