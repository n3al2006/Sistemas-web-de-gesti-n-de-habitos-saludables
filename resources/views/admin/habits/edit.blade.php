@extends('admin.layouts.admin')

@section('content')
<section class="manage-habits">
    <div class="header-section">
        <h2><i class="fas fa-edit"></i> Editar Hábito</h2>
    </div>

    <form action="{{ route('admin.habits.update', $habit) }}" method="POST" class="habit-form">
        @csrf
        @method('PUT')
        @include('admin.habits.form')
        
        <div class="form-actions">
            <button type="submit" class="create-button">
                <i class="fas fa-save"></i> Actualizar Hábito
            </button>
            <a href="{{ route('admin.habits.index') }}" class="cancel-button">
                <i class="fas fa-times"></i> Cancelar
            </a>
        </div>
    </form>
</section>
@endsection