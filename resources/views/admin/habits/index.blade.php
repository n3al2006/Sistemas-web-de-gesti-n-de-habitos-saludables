@extends('admin.layouts.admin')

@section('content')
<section class="manage-habits">
    <div class="header-section">
        <h2><i class="fas fa-tasks"></i> Gestión de Hábitos</h2>
        <a style="text-decoration: none" href="{{ route('admin.habits.create') }}" class="create-button">
            <i class="fas fa-plus"></i> Crear Nuevo Hábito
        </a>
    </div>

    <div class="stats-bar">
        <div class="stat">
            <h3>12</h3>
            <p>Hábitos Activos</p>
        </div>
        <div class="stat">
            <h3>4</h3>
            <p>Hábitos Inactivos</p>
        </div>
        <div class="stat">
            <h3>2</h3>
            <p>Hábitos Pendientes</p>
        </div>
    </div>

    <div class="controls">
        <input type="text" class="search-input" placeholder="Buscar hábitos...">
        <select class="filter-select">
            <option value="">Filtrar por Estado</option>
            <option value="active">Activo</option>
            <option value="inactive">Inactivo</option>
            <option value="pending">Pendiente</option>
        </select>
    </div>

    <table class="habits-table">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>CATEGORÍA</th>
                <th>FRECUENCIA</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habits as $habit)
            <tr>
                <td>{{ $habit->name }}</td>
                <td>
                    <span class="tag {{ strtolower($habit->category) }}">
                        {{ $habit->category }}
                    </span>
                </td>
                <td>{{ $habit->frequency }} veces {{ $habit->frequency_type }}</td>
                <td>
                    <span class="status {{ strtolower($habit->is_active ? 'active' : 'inactive') }}">
                        {{ $habit->is_active ? 'ACTIVO' : 'INACTIVO' }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('admin.habits.edit', $habit) }}" class="edit">
                        <i class="fas fa-pen"></i> Editar
                    </a>
                    <form action="{{ route('admin.habits.destroy', $habit) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        <button class="page-btn">&laquo; Anterior</button>
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn">Siguiente &raquo;</button>
    </div>
</section>
@endsection