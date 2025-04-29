@extends('admin.layouts.admin')

@section('content')
<section class="manage-habits">
    <div class="header-section">
        <h2><i class="fas fa-users"></i> Gestión de Usuarios</h2>
    </div>

    <div class="top-users-section">
        <h3><i class="fas fa-trophy"></i> Top Usuarios del Mes</h3>
        <div class="top-users-grid">
            @foreach($topUsers as $index => $topUser)
            <div class="top-user-card">
                <div class="user-rank">
                    <span class="rank-icon">{{ ['🥇', '🥈', '🥉', '4️⃣', '5️⃣'][$index] }}</span>
                    <span class="rank-number">#{{ $index + 1 }}</span>
                </div>
                <p class="user-name">{{ $topUser->name }}</p>
                <p class="user-stats">{{ $topUser->monthly_progress }} hábitos completados</p>
            </div>
            @endforeach
        </div>
    </div>

    <table class="habits-table">
        <thead>
            <tr>
                <th>USUARIO</th>
                <th>EMAIL</th>
                <th>HÁBITOS</th>
                <th>PROGRESO MENSUAL</th>
                <th>RACHA</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->habits->count() }}</td>
                <td>{{ $user->monthly_progress }} completados</td>
                <td>
                    <span class="streak {{ $user->progress->count() > 10 ? 'high-streak' : '' }}">
                        <i class="fas fa-fire"></i> {{ $user->progress->count() }} días
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.users.show', $user) }}" class="view-details">
                        <i class="fas fa-eye"></i> Ver detalles
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection