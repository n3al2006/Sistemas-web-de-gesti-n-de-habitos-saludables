@extends('admin.layouts.admin')

@section('content')
<section class="manage-habits">
    <div class="header-section">
        <h2><i class="fas fa-user"></i> Usuario: {{ $user->name }}</h2>
        <p class="user-email">{{ $user->email }}</p>
    </div>

    <div class="stats-bar">
        <div class="stat">
            <h3>{{ $allHabits->count() }}</h3>
            <p>Hábitos Totales</p>
        </div>
        <div class="stat">
            <h3>{{ $monthlyProgress }}</h3>
            <p>Progreso Mensual</p>
        </div>
        <div class="stat">
            <h3>{{ $user->progress->count() }}</h3>
            <p>Racha Actual</p>
        </div>
    </div>

    <div class="user-habits-section">
        <div class="section-header">
            <h3><i class="fas fa-list-check"></i> Hábitos del Usuario</h3>
        </div>

        <table class="habits-table">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>TIPO</th>
                    <th>FRECUENCIA</th>
                    <th>ESTADO</th>
                    <th>PROGRESO</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allHabits as $habit)
                <tr>
                    <td>{{ $habit->name }}</td>
                    <td>
                        <span class="tag {{ $habit->habit_template_id ? 'adopted' : 'personal' }}">
                            {{ $habit->habit_template_id ? 'Adoptado' : 'Personal' }}
                        </span>
                    </td>
                    <td>{{ $habit->frequency }} veces {{ $habit->frequency_type }}</td>
                    <td>
                        <span class="status {{ $habit->is_active ? 'active' : 'inactive' }}">
                            {{ $habit->is_active ? 'ACTIVO' : 'INACTIVO' }}
                        </span>
                    </td>
                    <td>
                        <span class="progress-count">
                            <i class="fas fa-check-circle"></i>
                            {{ $habit->progress ? $habit->progress->where('completed', true)->count() : 0 }} completados
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection