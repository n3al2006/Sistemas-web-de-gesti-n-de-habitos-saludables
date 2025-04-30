@extends('layouts.app')

@section('content')
<div class="habit-form-container">
    <h2 class="habit-form-title">Crear Nuevo Hábito</h2>

    <form action="{{ route('user.habits.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="name">
                Nombre del Hábito
            </label>
            <input type="text" name="name" id="name" 
                   class="form-input"
                   required>
        </div>

        <div class="form-group">
            <label class="form-label" for="description">
                Descripción
            </label>
            <textarea name="description" id="description" 
                      class="form-input"
                      rows="3"></textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="frequency">
                Frecuencia
            </label>
            <input type="number" name="frequency" id="frequency" 
                   class="form-input"
                   min="1" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="frequency_type">
                Tipo de Frecuencia
            </label>
            <select name="frequency_type" id="frequency_type" 
                    class="form-input form-select"
                    required>
                <option value="daily">Diario</option>
                <option value="weekly">Semanal</option>
                <option value="monthly">Mensual</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="reminder_time">
                Hora de Recordatorio
            </label>
            <input type="time" name="reminder_time" id="reminder_time" 
                   class="form-input">
            <p class="form-hint">Opcional: Establece una hora para recibir recordatorios</p>
        </div>

        <button type="submit" class="submit-button">
            Crear Hábito
        </button>
    </form>
</div>
@endsection