<div class="sidebar">
    <div class="sidebar-logo">
        <span>🌱</span>
        <h1>HabitHub</h1>
    </div>

    <nav>
        <a href="{{ route('dashboard') }}" 
           class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="nav-icon">📊</span>
            Hábitos
        </a>
        <a href="{{ route('user.habits.recommended') }}" 
           class="nav-item {{ request()->routeIs('user.habits.recommended') ? 'active' : '' }}">
            <span class="nav-icon">⭐</span>
            Recomendados
        </a>
        <a href="{{ route('habits.challenge.index') }}" class="nav-item {{ request()->routeIs('habits.challenge.index') ? 'active' : '' }}">
            <span class="nav-icon">🎯</span>
            Desafíos
        </a>
        <a href="{{ route('habits.showProgress') }}" class="nav-item {{ request()->routeIs('habits.showProgress') ? 'active' : '' }}">
            <span class="nav-icon">📈</span>
            Progreso
        </a>
        <a href="{{ route('habits.indexRece') }}" class="nav-item {{ request()->routeIs('habits.indexRece') ? 'active' : '' }}">
            <span class="nav-icon">🥗</span>
            Recetas
        </a>
    </nav>

    <div class="user-section">
        <div class="user-profile">
            <div class="user-avatar">
                {{ substr(Auth::user()->name, 0, 2) }}
            </div>
            <div class="user-info">
                <h3>{{ Auth::user()->name }}</h3>
                <p>Miembro activo</p>
            </div>
        </div>
        
        <a href="{{ route('profile.edit') }}" class="nav-item">
            <span class="nav-icon">👤</span>
            Editar perfil
        </a>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-item w-full text-left">
                <span class="nav-icon">🚪</span>
                Cerrar Sesión
            </button>
        </form>
    </div>
</div>