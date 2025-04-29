<div class="habit-form">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="{{ old('name', $habit->name ?? '') }}">
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea name="description" id="description" rows="3">{{ old('description', $habit->description ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="category">Categoría</label>
        <input type="text" name="category" id="category" value="{{ old('category', $habit->category ?? '') }}">
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="frequency">Frecuencia</label>
            <input type="number" name="frequency" id="frequency" value="{{ old('frequency', $habit->frequency ?? 1) }}" min="1">
        </div>

        <div class="form-group">
            <label for="frequency_type">Tipo de Frecuencia</label>
            <select name="frequency_type" id="frequency_type">
                <option value="daily" {{ (old('frequency_type', $habit->frequency_type ?? '') == 'daily') ? 'selected' : '' }}>Diario</option>
                <option value="weekly" {{ (old('frequency_type', $habit->frequency_type ?? '') == 'weekly') ? 'selected' : '' }}>Semanal</option>
                <option value="monthly" {{ (old('frequency_type', $habit->frequency_type ?? '') == 'monthly') ? 'selected' : '' }}>Mensual</option>
            </select>
        </div>
    </div>

    <div class="form-group checkbox">
        <label>
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $habit->is_active ?? true) ? 'checked' : '' }}>
            <span>Activo</span>
        </label>
    </div>
</div>