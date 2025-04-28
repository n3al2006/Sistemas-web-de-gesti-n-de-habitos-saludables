@extends('admin.layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-blue-100 p-6 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">Habit Templates</h3>
            <p class="mb-4">Manage habit templates for users</p>
            <a href="{{ route('admin.habits.index') }}" class="text-blue-600 hover:text-blue-800">
                Manage Templates →
            </a>
        </div>
        
        <!-- Add more dashboard cards here as needed -->
    </div>
</div>
@endsection