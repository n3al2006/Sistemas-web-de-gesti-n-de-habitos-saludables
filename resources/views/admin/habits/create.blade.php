@extends('admin.layouts.admin')

@section('content')
<section class="manage-habits">
    <div class="header-section">
        <h2><i class="fas fa-plus-circle"></i> Create New Habit</h2>
    </div>

    <form action="{{ route('admin.habits.store') }}" method="POST" class="habit-form">
        @csrf
        @include('admin.habits.form')
        
        <div class="form-actions">
            <button type="submit" class="create-button">
                <i class="fas fa-check"></i> Create Habit
            </button>
            <a href="{{ route('admin.habits.index') }}" class="cancel-button">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</section>
@endsection