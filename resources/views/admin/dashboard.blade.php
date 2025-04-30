@extends('admin.layouts.admin')

@section('content')
<section class="manage-habits">
    <div class="header-section">
        <h2><i class="fas fa-chart-line"></i> Panel de Administración</h2>
    </div>

    <div class="dashboard-grid">
        <div class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-list-check"></i>
            </div>
            <div class="card-content">
                <h3>Plantillas de Hábitos</h3>
                <p>Administra las plantillas de hábitos para usuarios</p>
                <a href="{{ route('admin.habits.index') }}" class="card-link">
                    Gestionar Habitos <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-content">
                <h3>Gestión de Usuarios</h3>
                <p>Administra los usuarios y monitorea su progreso</p>
                <a href="{{ route('admin.users.index') }}" class="card-link">
                    Gestionar Usuarios <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-chart-pie"></i>
            </div>
        </div>
    </div>
</section>
@endsection